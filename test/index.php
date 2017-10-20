<?php
//    $a = 20;
//    $b = "2bor";
//    $c = $a*$b;
//    echo $c;
//
//    $d = "";
//    if ($d) echo "non-empty";
//    else echo "empty";
//
//    $large_number = 2147483647;
//    var_dump($large_number);
//
//    $large_number = 2147483648;
//    var_dump($large_number);
//
//    $x = "BOb";
//    $y = &$x;
//    $y = "alice";
//    echo $x;
//
//    const MYSTR = "<br>const<br>";
//    echo MYSTR;
//
//    echo(strpos('Hello', 'e'));
//
//    $arr = array("one", "two", "three");
//    for($i = 0; $i < count($arr); $i++){
//        echo "$arr[$i]";
//    }
echo "<pre>";

    global $n;
    $n = 2;

    function ntimes($y){
        static $n = 3;
        return $n*$y;
    }

    echo ntimes(5);


    //echo"<pre>";

    $a = [[1,2,3], ["red", "blue"]];

    $b = serialize($a);
    file_put_contents("file.txt", $b);
    $c = unserialize(file_get_contents("file.txt"));
    var_dump($c);

    $b1 = json_encode($a);
    file_put_contents("file1.txt", $b1);
    $c1 = json_decode(file_get_contents("file1.txt"));
    var_dump($c1);

    echo("time: ".time());
    echo("<br>");
    echo("mircotime: ".microtime());
    echo("<br>");
    echo("mircotime: ".microtime(true));
    echo"</pre>";

    if(0 == "string")
        echo "<br>empty<br>";

    function tEsT(){
        echo "<br>test<br>";
    }

    test();
    echo "string {test()}";
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Example</title>
        <style>

            /*ul ol{*/
                /*color: blue;*/
            /*}*/

            /*ul>li{*/
                /*color: deeppink;*/
            /*}*/

            li { color: blue; }
            li.item { color: red; }
            ul li ul li { color: green; }
            #the-item { color: black; }
        </style>
    </head>
    <body  onload="init()">
        <!-- main part -->
        <p>Hello WorldWideWeb!<br /> Bonjour les Francais!<br /> Gruezi Schweiz!</p>
<!--        <ul>-->
<!--            <li>Food-->
<!--                <ol>-->
<!--                    <li>Bread</li>-->
<!--                    <li>Cheese</li>-->
<!--                </ol>-->
<!--            </li>-->
<!--            <li>Drinks-->
<!--                <ol>-->
<!--                    <li>Cola</li>-->
<!--                    <li>Fanta</li>-->
<!--                </ol>-->
<!--            </li>-->
<!--            <li>And so on...</li>-->
<!--        </ul>-->
        <ul>
            <li>
                <ul>
                    <li>
                        First
                    </li>
                    <li id="the-item">
                        Second
                    </li>
                    <li class="item">
                        Third
                    </li>
                    <li class="item" id="the-item">
                        Fourth
                    </li>
                </ul>
            </li>
        </ul>
        <br>
        <table>
            <caption>Example Table</caption>
            <tr>
                <th>Nr.</th>
                <th>Name</th>
                <th>Age</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Smith</td>
                <td>28</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jones</td>
                <td>24</td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td rowspan="3">A</td>
                <td>B</td>
                <td>C</td>
            </tr>
            <tr>
                <td>D</td>
                <td>E</td>
            </tr>
            <tr>
                <td colspan="2">F</td>
            </tr>
        </table>
        <noscript>
            this page need js
        </noscript>
        <script type="text/javascript">
            function f() {
                a = 7;
                var b = 9;
            }
            f();
            //console.log(a);
            //console.log(b);
            x = 3;
            x *= "2b";

            //console.log(x);

            greeting = 'bonjour';
            console.log("say 'hello'\n");
            console.log('say "hello"\n');
            console.log(`say ${greeting}`);

            arr = [1,2,4]

            for(i in arr)
                console.log(i)

            console.log(undefined == 0)

            function init() {
                var el =
                    document.getElementById("parent");
                el.addEventListener("click", func);
                var el =
                    document.getElementById("child");
                el.addEventListener("click", func);
            }

            function func(event) {
                alert("event: "+event+
                    " on element: "+this.id);
                event.stopPropagation();
            }
        </script>

        <div>
            <div id="parent">
                Parent
                <div id="child">
                    Child
                </div>
            </div>
        </div>
    </body>
</html>