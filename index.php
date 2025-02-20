<?php
$hands = ['rock', 'paper', 'scissors'];
//создаём массив с вариантами выбора
$botHand = $hands[array_rand($hands)];
//создаём переменную, которая хранит случайный вариант из массива
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
//проверяем отправлен ли запрос методом пост, заполнено ли поле
  $userHand = ($_POST['user_hand']);
//выбранное пользователем значение сохраняется в переменную 
    if ($userHand === $botHand) {
      $result = "It's a Tie! Both of you chose $userHand";
//прописывается условие с ничьёй с сохранением результата
    } elseif (
      ($userHand === "rock" && $botHand === "scissors") ||
      ($userHand === "scissors" && $botHand === "paper") ||
      ($userHand === "paper" && $botHand === "rock")
    ) {
      $result="It's an easy W! $userHand beats $botHand";
      //прописывается условие с победой пользователя
    } else {
      $result="It's an L, loser, $userHand loses to $botHand";
      //прописывается условие с поражением пользователя
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rock, Paper, Scissors</title>
</head>
<body>
  <h1>Rock, Paper, Scissors</h1>
  <form method="POST">
    <label for="user_hand">Choose rock, paper or scissors</label>
    <select name="user_hand" id="user_hand" required>
      <option value="rock">Rock</option>
      <option value="paper">Paper</option>
      <option value="scissors">Scissors</option>
    </select>
    <button type="submit">Play</button>
  </form>

<?php if (isset($result)): ?>
  <h1>Result:</h1>
  <p><?php echo $result; ?></p>
<?php endif; ?>
</body>
</html>
