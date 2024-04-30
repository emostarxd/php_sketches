<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Text Template Processor</title>  
    <!-- Подключение Bootstrap CSS -->  
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  
</head>  
<body>  
    <div class="container mt-5">  
        <form method="post">  
            <div class="form-group">  
                <label for="enContent">EN Content</label>  
                <textarea class="form-control" id="enContent" name="enContent" rows="3"></textarea>  
            </div>  
            <button type="submit" class="btn btn-primary">Создать запрос</button>  
        </form>  
  
        <?php  
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["enContent"])) {  
            $enContent = $_POST["enContent"];  
            // Используем регулярное выражение для поиска года в тексте  
            preg_match('/\b(\d{4})\b/', $enContent, $matches);  
            $year = $matches[1] ?? 'YEAR';  
  
            // Формируем шаблон с использованием найденного года  
            $template = "Переведи на украинский, сохрани следующий формат заголовков, где {$year} это год, указанный в заголовках текста для редактирования, сначала покажи это:  
Назва статті (H1): {$year} рік якої тварини за Східним календарем  
Title: {$year} рік якої тварини за Китайським календарем  
Затем всю статью, сохраняя заголовки:  
Вступ  
ЕЛЕМЕНТИ КИТАЙСЬКОГО ЗОДІАКУ  
Загальна характеристика символу {$year} року  
Риси характеру народжених у {$year} році  
Щасливі числа, кольори і знаки для народжених у {$year} році  
НЕ щасливі знаки, числа і кольори для тих, хто народився в {$year}  
Найкращі кар’єрні можливості для тих, хто народився в {$year} році  
Народився в {$year} році: Сумісність у стосунках  
Важливі події {$year} року  
  
Далее текст статьи: ";  
        ?>  
            <div class="form-group mt-4">  
                <label for="resultContent">Result Content</label>  
                <textarea class="form-control" id="resultContent" rows="10"><?php echo htmlspecialchars($template); ?></textarea>  
            </div>  
            <button class="btn btn-secondary" onclick="copyToClipboard()">COPY</button>  
        <?php  
        }  
        ?>  
    </div>  
  
    <!-- Подключение Bootstrap и jQuery JS -->  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
  
    <script>  
        function copyToClipboard() {  
            var copyText = document.getElementById("resultContent");  
            copyText.select();  
            document.execCommand("copy");  
            alert("Содержимое скопировано в буфер обмена");  
        }  
    </script>  
</body>  
</html>  
