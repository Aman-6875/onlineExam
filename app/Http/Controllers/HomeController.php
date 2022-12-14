<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\QuestionBank;
use App\Models\QuestionOptions;
use App\Models\Question;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Traits\VerifyUser;

class HomeController extends Controller
{
    use VerifyUser;
    public function index(Request $request)
    {
        $request->session()->forget('exam_id');
        $request->session()->forget('examQuestion');
        $exams = Exam::get();
        return view('welcome')->with('exams', $exams);
    }

    public function examDetails($id)
    {
        $exam = Exam::findOrFail($id);
        // $questionBank = QuestionBank::where('id', $exam->question_bank_id)->with('questions')->first();

        $exam_questions = ExamQuestion::where('exam_id', $exam->id)->with('question')->get();
        if ($exam->type == 'full_exam') {
            $exam_time_limit = $exam->time_limit;
        } else {
            $count_time = 0;
            foreach ($exam_questions as $item) {
                $count_time = $count_time +  $item->question->answering_time;
            }
            $exam_time_limit = $count_time;
        }
        return view('exam_details')
            ->with('exam', $exam)
            ->with('exam_questions', $exam_questions)
            ->with('exam_time', $exam_time_limit);
    }
    public function submitAnswer(Request $request)
    {
        //  return $request->all();
        foreach ($request->question as $question_id) {
            $answer[] = QuestionOptions::where('question_id', $question_id)->where('is_true', 1)->pluck('id')->toArray();
        }

        $count = 0;
        $neg = 0;
        $total = 0;

        foreach ($answer as $item) {
            $temp = false;
            foreach ($item as $i) {
                if ($request["answers-" . $i] != 'on') {
                    $temp = true;
                }
                if (true) {
                    $question = QuestionOptions::where('id', $i)->pluck('question_id')->first();
                    $wrong_options = QuestionOptions::where('question_id', $question)->where('is_true', 0)->pluck('id')->toArray();
                    // foreach()
                    foreach ($wrong_options as $id) {
                        if ($request["answers-" . $id] == 'on') {
                            $temp = true;
                            break;
                        }
                    }
                }
                if ($temp == false) {
                    if ($item[count($item) - 1] == $i) {
                        // $total = $total + (QuestionOptions::where('id'))
                        $mark = Question::where('id', $question)->pluck('number')->first();

                        $total = $total + $mark;
                    }
                }
            }
            if ($temp != true) {
                $count = $count + 1;
            } else {
                $neg = $neg + 1;
            }
        }
        // dd($count,$neg,$total,$request->all(),$answer);
        $exam = Exam::findOrFail($request->exam_id);
        $negTotal = 0;
        if ($exam->is_negative_on) {

            $negTotal = $neg * $exam->negative_number;
        }
        // dd($negTotal);
        $grandTotal = $total - $negTotal;
        return view('result_page')
            ->with('Total', $grandTotal)
            ->with('negTotal', $negTotal)
            ->with('correct_answer', $count)
            ->with('wrong_answer', $neg)
            ->with('exam', $exam);
    }

    public function questionBank()
    {
        if ($this->checkStuden()) {
            return "You don't have the access to create question";
        }
        return view('question_bank_create');
    }
    public function questionBankCreate(Request $request)
    {
        if ($this->checkStuden()) {
            return "You don't have the access to create question";
        }
        $data = [
            'title' => $request->title,
            'examinar_id' => 1, //auth->id
        ];
        QuestionBank::create($data);
        return redirect()->back();
    }
    public function question()
    {
        if ($this->checkStuden()) {
            return "You don't have the access to create question";
        }
        return view('question_create');
    }
    public function questionCreate(Request $request)
    {
        if ($this->checkStuden()) {
            return "You don't have the access to create question";
        }
        // return $request->all();

        // Question::create($request->except(['_token', 'options', 'answer']));

        $id = Question::insertGetId($request->except(['_token', 'options', 'answer']));
        // dd($id);
        for ($i = 0; $i < count($request['options']); $i++) {
            $data = [
                'title' => $request['options'][$i],
                'question_id' => $id,
                'is_true' => $request['answer'][$i]

            ];
            // dd($data);
            QuestionOptions::create($data);
        }
        $exam_id = session()->get('exam_id');
        if ($exam_id != null) {
            $data_exam_question = [
                'exam_id' => $exam_id,
                'question_id' => $id,
                'number' => $request->number,
                'answering_time' => $request->answering_time,
            ];
            // dd($data_exam_question);
            ExamQuestion::create($data_exam_question);
            $request->session()->put('examQuestion', ExamQuestion::where('exam_id', $exam_id)->with('question')->get());
            return redirect()->to('/create-exam-question');
        }

        return redirect()->back();
    }
    public function exam(Request $request)
    {
        if ($this->checkStuden()) {
            return "You don't have the access to create question";
        }

        return view('exam_create');
    }
    public function examCreate(Request $request)
    {

        // Question::create($request->except('token'));
        // $data = [
        //     'title' => $request->title,
        //     'type' => $request->type,
        //     'type' => $request->type,
        // ];

        if ($request->is_negative_on == '1') {
            $request['is_negative_on'] = 1;
        } else {
            $request['is_negative_on'] = 0;
        }

        Exam::create($request->except('token'));
        return redirect()->back();
    }

    public function addExamQuestion(Request $request)
    {
        if ($this->checkStuden()) {
            return "You don't have the access to create question";
        }
        $request['number'] = Question::where('id', $request->question_id)->pluck('number')->first();
        ExamQuestion::create($request->except('_token'));
        $request->session()->put('examQuestion', ExamQuestion::where('exam_id', $request->exam_id)->with('question')->get());
        $request->session()->put('exam_id', $request->exam_id);
        // dd($request->session()->all());
        return back();
    }

    public function examQuestion(Request $request)
    {
        if ($this->checkStuden()) {
            return "You don't have the access to create question";
        }

        return view('exam_question_create');
    }
    public function editExamQuestion($id)
    {
        if ($this->checkStuden()) {
            return "You don't have the access to create question";
        }
        return view('edit_exam_question_create')->with('exam_Question', ExamQuestion::where('id', $id)->first());
    }
    public function deleteExamQuestion($id, Request $request)
    {
        if ($this->checkStuden()) {
            return "You don't have the access to create question";
        }
        ExamQuestion::where('id', $id)->delete();
        $exam_id = session()->get('exam_id');
        $request->session()->put('examQuestion', ExamQuestion::where('exam_id', $exam_id)->with('question')->get());
        return redirect()->to('/create-exam-question');
    }
    public function UpdateExamQuestion(Request $request)
    {
        if ($this->checkStuden()) {
            return "You don't have the access to create question";
        }
        $data = [
            'number' => $request->number,
        ];
        ExamQuestion::where('id', $request->id)->update($data);
        $exam_id = session()->get('exam_id');
        $request->session()->put('examQuestion', ExamQuestion::where('exam_id', $exam_id)->with('question')->get());
        return redirect()->to('/create-exam-question');
    }

    public function login()
    {
        return view('login');
    }
    public function registration()
    {
        return view('registration');
    }

    public function RegisterUser(Request $request)
    {
        // return $request->all();
        // User::crea
        $request['password'] = Hash::make($request->password);
        // dd($request->all());
        $user_id = User::insertGetId($request->except('_token'));
        Auth::loginUsingId($user_id);
        return redirect()->to('/home');
    }
    public function LoginUser(Request $request)
    {
        // return $request->all();
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->to('/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}
