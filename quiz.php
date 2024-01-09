<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password="";
$dbname = "innovation";
$conn = mysqli_connect($servername, $username, $password, $dbname);

echo $_SESSION["username"];
?>

<head>
    <title>QUIZ</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>            

    <script type="text/javascript" src="bootstrap/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"></meta>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"></link>
    <link rel="stylesheet" href="quizandsucodu.css" type="text/css"></link>
<style>

.p {
  
  font-size: 50px;
  margin-bottom: 10px;
}
.f0{
/*    color:#ff0000;*/
    background-color: #F2F3F4 ;
    font-size: 20px;
    height: 50px;
    
}
.g0
{
    color:#D55330  ;
    height: 50px;
    font-size :18px; 
    font-weight: bold;
}
.a{
    text-align: center;
    border : none;
}
/*td{
    height : 25px;
}*/
</style>
</head>    
<body bgcolor="#ffffff">
    
    <div class="row">
    <div class="col-xs-6">
        <div  class="p" id="solve" style="text-align: left; padding-left:20px"></div>
        <div id = "instr" style="text-align: left; padding-left:20px"></div>
    </div>
        <div class="col-xs-6">
            <p class="p" id="demo1" style="text-align: right; padding-right:200px"></p>
        </div>
    </div>
    
    <div class="row">
    <div class="col-xs-6">
        <div class="title" id="cq">SUCODU - Quiz</div>
        <h4 style="margin-left : 4px; margin-bottom: 20px" id="line"><b>Please consider ' '(single quote) as " "(double quote) in code snippet [printf("   ") is written as printf('  ')]</b></h4>
    </div>
        <div class="col-xs-6">
            <div class="p" id="demo" style="text-align: right; padding-right:200px" ></div>
        </div>    
    </div>
    <script>
    // Set the date we're counting down to
    var countDownDate = new Date().getTime() + (1500000); // Update the count down every 1 second
    
    var x = setInterval(function() {

    var now = new Date().getTime(); // Get todays date and time
    
    var distance = countDownDate - now; // Find the distance between now an the count down date
    
    
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)); // Time calculations for days, hours, minutes and seconds
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    document.getElementById("demo").innerHTML = hours + "h "
    + minutes + "m " + seconds + "s "; // Output the result in an element with id="demo"
    
    // If the count down is over, write some text 
    if (distance < 0) 
    {  // var countDownDate1 = new Date().getTime();
        container1.style.display = 'none';
        resultCont.style.display = '';
        clearInterval(x); 
        document.getElementById("sub").type = "submit";
        document.getElementById("demo").innerHTML = "";
        document.getElementById("cq").innerHTML = "";
        document.getElementById("line").innerHTML = "";
        document.getElementById("solve").innerHTML = "Solve the Sudoku !!";
        document.getElementById("instr").innerHTML = "Click on the submit button once sudoku is completed";

        
        calc_time();
        document.getElementById("puzzle_grid").style = 'align:left' ;
    }
}, 1000);
</script>
    <div class="row">
        <div class="col-xs-6">
            <div id="quizContainer" >
                
                <pre><div id="question" class="question"></div></pre>
                <label class="option"><input type="radio" name="option" value="1"><span id ="opt1"></span></input></label>
                <label class="option"><input type="radio" name="option" value="2"><span id ="opt2"></span></input></label>
                <label class="option"><input type="radio" name="option" value="3"><span id ="opt3"></span></input></label>
                <label class="option"><input type="radio" name="option" value="4"><span id ="opt4"></span></input></label>
                <button id ="nextButton" class="next-btn " style="width:150px; height:50px"  onclick="loadNextQuestion();">Next Question</button>
            </div>
            <div id="result" class="container result" style="display: none"></div>
        </div>
        <div class="col-xs-6" >
            <form method="post" action="sudoku_validation.php"> 
                <center>
                <table id="puzzle_grid" cellspacing="0" cellpadding="0"  class="table-bordered table-responsive">
                    <tbody align="center" style="height:40px">
                    <tr style="border-top:#666999 solid">
                        <td class="g0" id="c00" style="border-left:#666999 solid 2px" >
                            <input class="a" type="text" size="1" name="1" maxlength="1" ></input> 
                    </td>
                    <td class="g0" id="c10" >
                        <input class="a" type="text" size="2" name="2" maxlength="1"></input>
                    </td>
                    <td class="g0" id="c20" style="border-right:#666999 solid 2px">
                        <input class="a" type="text" size="2" name="3" maxlength="1"></input>
                    </td>
                    <td class="g0" id="c30">
                         <input class="a" type="text" size="2" name="4" maxlength="1"></input>
                    </td>
                    <td class="g0" id="f40" name="5">
                        <input class="a" size="2" name="5"  maxlength="1" ></input>
                    </td>
                    <td class="g0" id="c50" name="6"style="border-right:#666999 solid 2px">
                        <input class="a" size="2" name="6" maxlength="1" id="f50"></input>
                    </td>
                    <td class="g0" id="c60" name="7">
                        <input class="a" size="2" name="7" maxlength="1" id="f60"></input>
                    </td>
                    <td class="f0" id="c70" name="8">
                        2
                    </td>
                    <td  class="f0" id="c80" name="9" style="border-right:#666999 solid 2px; ">
                        4
                    </td>
                </tr>
                <tr>
                    <td class="f0" id="c01" style="border-left:#666999 solid 2px"s>
                        4
                    </td>
                    <td class="f0" id="c11">
                        2
                    </td>
                    <td class="g0" id="c21" style="border-right:#666999 solid 2px">
                    <input class="a" size="2" name="8" maxlength="1" id="f11"></input>
                    </td>
                    <td class="g0" id="c31">
                        <input class="a" size="2" name="9" maxlength="1" id="f11"></input>
                    </td>
                    
                    <td class="g0" id="c41">
                        <input class="a" size="2" name="10" maxlength="1" id="f11"></input>
                    </td>
                    <td class="f0" id="c51" style="border-right:#666999 solid 2px">
                        3
                    </td>
                    <td class="g0" id="c61">
                        <input class="a" size="2" name="11" maxlength="1" id="f11"></input>
                    </td>
                    <td class="g0" id="c71">
                        <input class="a" size="2" name="12" maxlength="1" id="f11"></input>

                    </td>
                    <td class="g0" id="c81" style="border-right:#666999 solid 2px">
                        <input class="a" size="2" name="13" maxlength="1" id="f11" ></input>
                    </td>
                </tr>
                <tr style="border-bottom:#666999 solid">
                    <td class="g0" id="c02"style="border-left:#666999 solid 2px">
                        <input class="a" size="2" name="14" maxlength="1" id="f02"></input>
                    </td>
                    <td class="g0" id="c12">
                       <input class="a" size="2" name="15" maxlength="1" id="f12"></input>
                    </td>
                    <td class="g0" id="c22" style="border-right:#666999 solid 2px">
                        <input class="a" size="2"  name="16" maxlength="1"  id="f22"></input>
                    </td>
                    <td class="g0" id="c32">
                        <input class="a" size="2"  name="17" maxlength="1"  id="f32"></input>
                    </td>
                    <td class="f0" id="c42">
                     1
                    </td>
                    <td class="g0" id="c52" style="border-right:#666999 solid 2px" >
                       <input class="a" size="2" name="18" maxlength="1" id="f52"></input>
                    </td>
                    <td class="f0" id="c62">
                       9
                    </td>
                    <td class="g0" id="c72">
                       <input class="a" size="2" name="19" maxlength="1" id="f11" ></input>
                    </td>
                    <td class="f0" id="c82" style="border-right:#666999 solid 2px">
                       5
                    </td>
                </tr>
                <tr>
                    <td class="f0" id="c03" style="border-left:#666999 solid 2px">
                        7
                    </td>
                    <td class="f0" id="c13">
                       5
                    </td>
                    <td class="g0" id="c23" style="border-right:#666999 solid 2px">
                         <input class="a" size="2"  name="20" maxlength="1"  id="f13"></input>
                    </td>
                    <td class="f0" id="c33">
                        8
                    </td>
                    <td class="f0" id="c43">
                        4
                    </td>
                    <td class="g0" id="c53" style="border-right:#666999 solid 2px">
                        <input class="a" size="2"  name="21" maxlength="1"  id="f53"></input>
                    </td>
                    <td class="g0" id="c63">
                        <input class="a" size="2"  name="22" maxlength="1"  id="f63"></input>
                    </td>
                    <td class="g0" id="c73">
                        <input class="a" size="2"  name="23" maxlength="1"  id="f73"></input>
                    </td>
                    <td class="g0" id="c83" style="border-right:#666999 solid 2px">
                        <input class="a" size="2"  name="24" maxlength="1"  id="f83" ></input>
                    </td>
                </tr>
                <tr>
                    <td class="f0" id="c04" style="border-left:#666999 solid 2px">
                        8
                    </td>
                    <td class="f0" id="c14">
                        9
                    </td>
                    <td class="g0" id="c24" style="border-right:#666999 solid 2px">
                       <input class="a" size="2"  name="25" maxlength="1"  id="f04"></input>
                    </td>
                    <td class="f0" id="c34">
                        5
                    </td>
                    <td class="f0" id="c44">
                        6
                    </td>
                    <td class="g0" id="c54" style="border-right:#666999 solid 2px">
                       <input class="a" size="2"  name="26" maxlength="1"  id="f04"></input>
                    </td>
                    <td class="g0" id="c64">
                        <input class="a" size="2"  name="27" maxlength="1"  id="f04"></input>
                    </td>
                    <td class="g0" id="c74">
                        <input class="a" size="2"  name="28" maxlength="1"  id="f74"></input>
                    </td>
                    <td class="g0" id="c84" style="border-right:#666999 solid 2px">
                        <input class="a" size="2"  name="29" maxlength="1"  id="f84"></input>
                    </td>
                </tr>
                <tr style="border-bottom:#666999 solid">
                    <td class="g0" id="c05" style="border-left:#666999 solid 2px">
                        <input class="a" size="2"  name="30" maxlength="1"  id="f05"></input>
                    </td>
                    <td class="g0" id="c15">
                        <input class="a" size="2"  name="31" maxlength="1"  id="f15"></input>
                    </td>
                    <td class="g0" id="c25" style="border-right:#666999 solid 2px">
                        <input class="a" size="2"  name="32" maxlength="1"  id="f25"></input>
                    </td>
                    <td class="f0" id="c35">
                       9
                    </td>
                    <td class="g0" id="c45">
                       <input class="a" size="2"  name="33" maxlength="1"  id="f05"></input>
                    </td>
                    <td class="g0" id="c55" style="border-right:#666999 solid 2px">
                        <input class="a" size="2"  name="34" maxlength="1"  id="f55"></input>
                    </td>
                    <td class="f0" id="c65">
                       5
                    </td>
                    <td class="g0" id="c75">
                        <input class="a" size="2"  name="35" maxlength="1"  id="f75"></input>
                    </td>
                    <td class="g0" id="c85"style="border-right:#666999 solid 2px">
                        <input class="a" size="2"  name="36" maxlength="1"  id="f05"></input>
                    </td>
                </tr>
                <tr>
                    <td class="f0" id="c06" style="border-left:#666999 solid 2px">
                       5
                    </td>
                    <td class="f0" id="c16">
                       1
                    </td>
                    <td class="g0" id="c26" style="border-right:#666999 solid 2px">
                        <input class="a" size="2"  name="37" maxlength="1"  id="f16"></input>
                    </td>
                    <td class="g0" id="c36">
                        <input class="a" size="2"  name="38" maxlength="1"  id="f36"></input>
                    </td>
                    <td class="g0" id="c46">
                      <input class="a" size="2"  name="39" maxlength="1"  id="f16"></input>
                    </td>
                    <td class="f0" id="c56"style="border-right:#666999 solid 2px">
                        6
                    </td>
                    <td class="g0" id="c66">
                        <input class="a" size="2"  name="40" maxlength="1"  id="f66"></input>
                    </td>
                    <td class="g0" id="c76">
                        <input class="a" size="2"  name="41" maxlength="1"  id="f76"></input>
                    </td>
                    <td class="g0" id="c86" style="border-right:#666999 solid 2px">
                        <input class="a" size="2"  name="42" maxlength="1"  id="f86" ></input>
                    </td>
                </tr>
                <tr>
                    <td class="g0" id="c07" style="border-left:#666999 solid 2px">
                        <input class="a" size="2"  name="43" maxlength="1"  id="f17"></input>
                    </td>
                    <td class="g0" id="c17">
                        <input class="a" size="2"  name="44" maxlength="1"  id="f17"></input>
                    </td>
                    <td class="g0" id="c27" style="border-right:#666999 solid 2px">
                       <input class="a" size="2"  name="45" maxlength="1"  id="f17"></input>
                    </td>
                    <td class="g0" id="c37">
                       <input class="a" size="2"  name="46" maxlength="1"  id="f17"></input>
                    </td>
                    <td class="f0" id="c47">
                        2
                    </td>
                    <td class="g0" id="c57"style="border-right:#666999 solid 2px">
                        <input class="a" size="2"  name="47" maxlength="1"  id="f17"></input>
                    </td>
                    <td class="f0" id="c67">
                        6
                    </td>
                    <td class="g0" id="c77">
                        <input class="a" size="2"  name="48" maxlength="1"  id="f77"></input>
                    </td>
                    <td class="f0" id="c87" style="border-right:#666999 solid 2px">
                      9
                    </td>
                </tr>
                <tr style="border-bottom:#666999 solid">
                    <td class="g0" id="c08" style="border-left:#666999 solid 2px">
                        <input class="a" size="2"  name="49" maxlength="1"  id="f08"></input>
                    </td>
                    <td class="g0" id="c18">
                         <input class="a" size="2"  name="50" maxlength="1"  id="f78"></input>
                    </td>
                    <td class="g0" id="c28" style="border-right:#666999 solid 2px">
                        <input class="a" size="2"  name="51" maxlength="1"  id="f28"></input>
                    </td>
                    <td class="g0" id="c38">
                        <input class="a" size="2"  name="52" maxlength="1"  id="f38"></input>
                    </td>
                    <td class="g0" id="c48">
                        <input class="a" size="2"  name="53" maxlength="1"  id="f48"></input>
                    </td>
                    <td class="g0" id="c58" style="border-right:#666999 solid 2px">
                         <input class="a" size="2"  name="54" maxlength="1"  id="f78"></input>
                    </td>
                    <td class="g0" id="c68">
                        <input class="a" size="2"  name="55" maxlength="1"  id="f78"></input>
                    </td>
                    <td class="f0" id="c78">
                       3
                    </td>
                    <td class="f0" id="c88" style="border-right:#666999 solid 2px">
                        1
                    </td>
                </tr >
            </tbody>
        </table>
            <input type="hidden" name="timer" id="timer" ></input>
            <input type="hidden" name="quiz_score" id="quiz_score" ></input>
            <br><br><input type="hidden" name="sub" id="sub" style="width:150px; height: 50px" onclick="stoptimer();" ></input> 
            <div id="result"></div>
            <div id="result1"></div>

            </center>    
        </form>
             
    </div>
    </div>
            
        <script>


var questions = [{
        "question" : " Pick out the correct statement.",
        "option1" : " A derived class’s constructor cannot explicitly\n\
                         invokes its base class’s constructor",
        "sucoduans": "4",
        "option2" : " A derived class’s destructor cannot invoke its base \n\
class’s destructor",
        "option3" : " A derived class’s destructor can invoke its base class’s destructor",
        "option4" : " None of the mentioned",
        "answer" : "2"
},
{
   
        "question" : "Pick out the correct method in the c++ standard\n\
                     library algorithm.",
        "option1" : " mismatch",
        "option2" : " maximum",
        "option3" : " minimum",
        "option4" : " none of the mentioned",
        "answer" : "1",
        "sucoduans": "7"
        
}
,
{
        "question" : "How many vector container properties are there in c++?",
        "option1" : " 1",
        "option2" : " 2",
        "option3" : " 3",
        "option4" : " 4",
        "answer" : "3",
        "sucoduans": "3"
        
}
,
{
        "question" : "Which of the following advantages we lose\n\
                         by using multiple inheritance?",
            "sucoduans": "1",
        "option1" : " Dynamic binding",
        "option2" : " Polymorphism",
        "option3" : " Both Dynamic binding & Polymorphism",
        "option4" : " None of the mentioned",
        "answer" : "3"
        
        
}
,
{
        "question" : "What will happen if a string is empty?",
        "option1" : " It can’t be created.",
        "option2" : " Raises an error.",
        "option3" : " It can be used.",
        "option4" : " None of the mentioned",
        "answer" : "3",
        "sucoduans": "7"
        
}
,
{
        "question" : "What does the following statement mean?\n\
void a ",
        "option1" : "  variable a is of type void",
        "option2" : "  a is an object of type void",
        "option3" : "  declares a variable with value a",
        "option4" : "  flags an error",
        "answer" : "4",
        "sucoduans": "5"
        
}
,
{
        "question" : "Static variable declared in a class are also called_________",
        "option1" : " instance variable	",
        "option2" : " named constant	",
        "option3" : " global variable	",
        "option4" : " class variable",
        "answer" : "4",
        "sucoduans": "3"
        
}
,
{
        "question" : "#include <iostream>\n\
using namespace std;\n\
int main()\n\
{\n\
for ( ; ; ) \n\
cout << 'blank';\n\
return 0;\n\
}",
        "option1" : " blank",
        "option2" : " infinite loop ",
        "option3" : " Compile time Error",
        "option4" : " None of the above",
        "answer" : "2",
        "sucoduans": "6"
        
}
,
{
        "question" : "What is the importance of mutable keyword?",
        "option1" : "  It allows the data member to change within a const member function",
        "option2" : "  It will not allow the data member to change within a const member function",
        "option3" : "  It will copy the values of the variable",
        "option4" : " None of the mentioned",
        "answer" : "1",
        "sucoduans": "3"
        
}

,
{
       "question" : "Consider the declarations:\n\
char first (int(*)(char,float));\n\
int second(char,float);\n\
Which of the following function invocation is valid?",
        "option1" : " first(*second);",
        "option2" : " first(&second);",
        "option3" : " first(second);",
        "option4" : " None fo these",
        "answer" : "3",
        "sucoduans": "9"
        
}
,
{
        "question" : "What is the difference between struct and class in C++?",
        "option1" : "All members of a structure are public and structures don’t have constructors and destructors",
        "option2" : "Members of a class are private by default and members of struct are public by default. When deriving a struct from a class/struct, default access-specifier for a base class/struct is public and when deriving a class, default access specifier is private.",
        "option3" : "All members of a structure are public and structures don’t have virtual functions",
        "option4" : "All of the above",
        "answer" : "2",
        "sucoduans": "5"
        
}
,
{
        "question" : " Can a destructor be virtual?\n\
        Will the following program compile?\n\
#include <iostream>using namespace std;\n\
class Base {public:virtual ~Base() {}   };\n\
int main() {\n\
return 0;\n\
}",
        "option1" : "Yes",
        "option2" : "NO",
        "option3" : "Compile Time Error",
        "option4" : "Run Time Error",
        "answer" : "1",
        "sucoduans": "4"
        
}
,
{
        "question" : " #include <stdio.h>\n\
int main()\n\
{\n\
const int x;\n\
x = 10;\n\
printf('%d', x);\n\
return 0;\n\
}",
        "option1" : "Compiler Error",
        "option2" : "10",
        "option3" : "0",
        "option4" : "Runtime Error",
        "answer" : "1",
        "sucoduans": "4"
        
}
,
{
        "question" : "Which of the following is true?",
        "option1" : "Static methods cannot be overloaded.",
        "option2" : "Static data members can only be accessed by static methods.",
        "option3" : "Non-static data members can be accessed by static methods.",
        "option4" : "Static methods can only access static members (data and methods)",
        "answer" : "4",
        "sucoduans": "7"
        
}
,
{
        "question" : "C does no automatic array bound checking. This is",
        "option1" : "true",
        "option2" : "false",
        "option3" : "C's asset",
        "option4" : "C's shortcoming",
        "answer" : "4",
        "sucoduans": "5"
        
}
,
{
    "question" : "Output of following C++ program?\n\
#include<iostream>using namespace std;\n\
int main()\n\
{\n\
int x = 10;\n\
int& ref = x;\n\
ref = 20;\n\
cout << 'x = ' << x << endl ;\n\
x = 30;\n\
cout << 'ref = ' << ref << endl;\n\
return 0;\n\
}",
        "option1" : "x = 20,ref = 30",
        "option2" : "x = 20,ref = 20",
        "option3" : "x = 10,ref = 30",
        "option4" : "x = 30,ref = 30",
        "answer" : "1",
        "sucoduans": "7"
        
}
,
{
        "question" : "What is meant by ofstream in c++?",
        "option1" : "Writes to a file",
        "option2" : "Reads from a file",
        "option3" : "Writes to a file & Reads from a file",
        "option4" : "None of the mentioned",
        "answer" : "1",
        "sucoduans": "7"
        
}
,
{
        "question" : "What is the output of this program?\n\
#include <iostream>using namespace std;\n\
int main () \n\
{int n; \n\
n = 43;\n\
cout << hex << n << endl;\n\
return 0;\n\
}",
        "option1" : "2c",
        "option2" : "2b",
        "option3" : "20",
        "option4" : "50",
        "answer" : "2",
        "sucoduans": "6"
        
}
,
{
        "question" : "What is this operator called ?: ?",
        "option1" : " conditional",
        "option2" : " relational",
        "option3" : " casting operator",
        "option4" : " none of the mentioned",
        "answer" : "1",
        "sucoduans": "3"
        
}
,
{
        "question" : "What is the use of the ‘finally’ keyword?",
        "option1" : "It used to execute at the starting of the program",
        "option2" : "It will be executed at the end of the program even if the exception arised",
        "option3" : "It will be executed at the starting of the program even if the exception arised",
        "option4" : "none of the mentioned",
        "answer" : "2",
        "sucoduans": "6"
        
}
];

/* global questions */

var currentQuestion =0;
var score =0;
var x1=0;
var distance1=0;
var totQuestion = questions.length;
var container1 = document.getElementById('quizContainer');
var questionEl = document.getElementById('question');
var opt1 = document.getElementById('opt1');
var opt2 = document.getElementById('opt2');
var opt3 = document.getElementById('opt3');
var opt4 = document.getElementById('opt4');


var nextButton = document.getElementById('nextButton');
var resultCont = document.getElementById('result');
var submitButton = document.getElementById('sub');

function loadQuestion(questionIndex)
{
    var q = questions[questionIndex];
    questionEl.textContent = (questionIndex + 1)+'.'+q.question;
    opt1.textContent = q.option1;
    opt2.textContent = q.option2;
    opt3.textContent = q.option3;
    opt4.textContent = q.option4;
};

function loadNextQuestion()
{
    var selectedOption = document.querySelector('input[type = radio]:checked');
    if(!selectedOption)
    {
        alert('please select ur answer');
        return;
    }
    var answer = selectedOption.value;
    if(questions[currentQuestion].answer === answer)
    {
        score +=1;
        if(currentQuestion === 0){
        document.getElementById("c25").innerHTML =questions[currentQuestion].sucoduans;
        
        }
        else if(currentQuestion === 1){
        document.getElementById("c54").innerHTML =questions[currentQuestion].sucoduans;
        }

        else if(currentQuestion === 2){
        document.getElementById("c60").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 3){
        document.getElementById("c37").innerHTML =questions[currentQuestion].sucoduans;
        }

        else if(currentQuestion === 4){
        document.getElementById("c68").innerHTML =questions[currentQuestion].sucoduans;
        }

        else if(currentQuestion === 5){
        document.getElementById("c50").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 6){
        document.getElementById("c12").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 7){
        document.getElementById("c02").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 8){
        document.getElementById("c45").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 9){
        document.getElementById("c73").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 10){
        document.getElementById("c48").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 11){
        document.getElementById("c64").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 12){
        document.getElementById("c17").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 13){
        document.getElementById("c31").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 14){
        document.getElementById("c77").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 15){
        document.getElementById("c10").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 16){
        document.getElementById("c85").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 17){
        document.getElementById("c83").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 18){
        document.getElementById("c36").innerHTML =questions[currentQuestion].sucoduans;
        }
        else if(currentQuestion === 19){
        document.getElementById("c71").innerHTML =questions[currentQuestion].sucoduans;
        }

    }
    else
    {
        
    }
    selectedOption.checked = false;
    currentQuestion++;
    if(currentQuestion === totQuestion-1)
    {
        nextButton.textContent = 'Finish';


    }
    if(currentQuestion === totQuestion)
    {

        container1.style.display = 'none';
        resultCont.style.display = '';
        document.getElementById("sub").type = "submit";
       // alert(score);

        clearInterval(x);
        document.getElementById("demo").innerHTML = "";
        document.getElementById("cq").innerHTML = "";
        document.getElementById("line").innerHTML = "";
        document.getElementById("solve").innerHTML = "Solve the Sudoku";
        document.getElementById("instr").innerHTML = "Click on the submit button once sudoku is completed";
        calc_time();
        return;
    }
    loadQuestion(currentQuestion);
}
loadQuestion(currentQuestion);

function calc_time()
{
            var countDownDate1 = new Date().getTime();
        x1 = setInterval(function() {

            // Get todays date and time
            var now1 = new Date().getTime();

            // Find the distance between now an the count down date
            distance1 = now1 - countDownDate1;

            // Time calculations for days, hours, minutes and seconds
            
            var hours1 = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes1 = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
            var seconds1 = Math.floor((distance1 % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo1").innerHTML = hours1 + "h "
            + minutes1 + "m " + seconds1 + "s ";
        }, 1000);
        //resultCont.textContent = 'Your score' + score;

}
function stoptimer()
{
        clearInterval(x1);

        document.getElementById("timer").value = distance1;
        document.getElementById("quiz_score").value = score;

}

//document.write('<a href="validation.php?number='+score+'">another page</a>');
</script>


<div id="rslt">
</div>

    </body>
</html>
