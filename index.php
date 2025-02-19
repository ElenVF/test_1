 <?php
    // функция для генерации двумерного массива со случайно расставленными цифрами 0 или 1
    function generateRandomArr($row, $col)
    {
        $arr = []; // пустой массив
        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $col; $j++) {
                $arr[$i][$j] = rand(0, 1); // заполняем массив случайными 0 или 1
            }
        }
        return $arr;
    }
    // функция для подсчета ячеек с нулями, которые имеют с собой > 2 ячеек с единицей
    function countCell($array)
    {
        $count = 0; // счетчик
        //перебираем массив
        for ($i = 0; $i < count($array); $i++) {
            for ($j = 0; $j < count($array[$i]); $j++) {
                if ($array[$i][$j] == 0) {
                    $countNear = 0; // счетчик соседних ячеек с 1
                    if (isset($array[$i - 1][$j]) && $array[$i - 1][$j] == 1) {
                        $countNear++; // верхняя
                    }
                    if (isset($array[$i + 1][$j]) && $array[$i + 1][$j] == 1) {
                        $countNear++; // нижняя
                    }
                    if (isset($array[$i][$j + 1]) && $array[$i][$j + 1] == 1) {
                        $countNear++; // правая
                    }
                    if (isset($array[$i][$j - 1]) && $array[$i][$j - 1] == 1) {
                        $countNear++; // левая
                    }
                    if ($countNear > 2) {
                        $count++; // считаем , сколько ячеек имеет больше 2х соседей со значением 1
                    }
                }
            }
        }

        return $count; // возвращаем это число

    }
    // размеры массива 
    $row = 5;
    $col = 5;
    $array = generateRandomArr($row, $col); // генерируем массив 5 Х 5
    $countCell = countCell($array); // подсчет ячеек
    ?>
 <script>
     // функция для изменения цвета таблицы
     function changeColor() {
         const myElement = document.getElementById('table');
         myElement.style.backgroundColor = "yellow";
         
     }
     function countCellColor(countCell){
        alert('Количество ячеек с нулями, имеющих рядом с собой больше двух ячеек с единицей:'+countCell);
        changeColor();
     }
 </script>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Test</title>
 </head>
 <body>
     <div class="buttons_control">
         <!--Кнопка изменения цвета на желтый -->
         <button class="button" type="button" onclick="changeColor()">
             Изменить цвет на желтый
         </button>
         <!-- Кнопка для подсчета ячеек и изменения цвета на желтый -->
         <button class="count button" type="button" onclick="countCellColor(<?=$countCell?>)">
             Подсчет ячеек
         </button>
         <!--Кнопка изменения цвета на желтый -->
         <button class="button" type="button" onclick="changeColor()">
             Изменить цвет на желтый
         </button>
     </div>
     <!--таблица -->
     <div class="table" style="margin:20px ;">
         <table border="1" id="table">
             <tbody>
                 <?php
                    // выводим сгенерированный массив через цикл
                    foreach ($array as $items) {
                    ?>
                     <tr>
                         <?php
                            foreach ($items as $item) {
                            ?>
                             <td><?php echo $item ?></td>
                         <?php } ?>
                     </tr>
                 <?php } ?>
             </tbody>
         </table>
     </div>
 </body>
 </html>