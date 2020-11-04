<!doctype html>
<html lang="en">

<head>
    <title>Question</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="/css/question.css" rel="stylesheet">
</head>

<body class="text-center">
    <div class="content">
        <div class="question">
            <?= $question ?><br />
        </div>
        <?php if ($isQuestioning) : ?>
            <form class="form" method="post" action="/question">
                <input type="hidden" name="question_id" value="<?= $question_id ?>" />
                <?php if (strcmp($questionType, "open") === 0): ?>
                    <textarea name="answer"></textarea>
                <?php elseif (strcmp($questionType, "yes-no") === 0) : ?>
                    <label><input type="radio" name="answer" value="yes">Si</label>
                    <label><input type="radio" name="answer" value="no">No</label>
                <?php elseif (strcmp($questionType, "scale") === 0) : ?>
                    <label><input type="radio" name="answer" value="1">1</label>
                    <label><input type="radio" name="answer" value="2">2</label>
                    <label><input type="radio" name="answer" value="3">3</label>
                    <label><input type="radio" name="answer" value="4">4</label>
                    <label><input type="radio" name="answer" value="5">5</label>
                <?php else : ?>
                    Tipo de pregunta invalida
                <?php endif; ?>
                <button type="submit" class="btn btn-lg btn-primary btn-block btn-login">Responder</button>
            </form>
        <?php else : ?>
            <div class="answer">
                <p><?= $answer ?></p>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>