<?php

/* 関数定義 */

// ビンゴの判定
function isBingo($wordList, $selectedWords) {
    $S = count($wordList);

    // 横方向にビンゴが成立しているかをチェック
    for ($i = 0; $i < $S; $i++) {
        $isBingo = true;
        for ($j = 0; $j < $S; $j++) {
            if (!in_array($wordList[$i][$j], $selectedWords)) {
                $isBingo = false;
                break;
            }
        }
        if ($isBingo) {
            return true;
        }
    }

    // 縦方向にビンゴが成立しているかをチェック
    for ($i = 0; $i < $S; $i++) {
        $isBingo = true;
        for ($j = 0; $j < $S; $j++) {
            if (!in_array($wordList[$j][$i], $selectedWords)) {
                $isBingo = false;
                break;
            }
        }
        if ($isBingo) {
            return true;
        }
    }

    // 左上から右下にかけて斜めにビンゴが成立しているかをチェック
    $isBingo = true;
    for ($i = 0; $i < $S; $i++) {
        if (!in_array($wordList[$i][$i], $selectedWords)) {
            $isBingo = false;
            break;
        }
    }
    if ($isBingo) {
        return true;
    }

    // 右上から左下にかけて斜めにビンゴが成立しているかをチェック
    $isBingo = true;
    for ($i = 0; $i < $S; $i++) {
        if (!in_array($wordList[$i][$S - 1 - $i], $selectedWords)) {
            $isBingo = false;
            break;
        }
    }
    if ($isBingo) {
        return true;
    }

    return false;
}

/* 関数定義ここまで */

// ビンゴカードのサイズを入力
$S = intval(fgets(STDIN));

// ビンゴカードの単語を入力
$wordList = [];
for ($i = 0; $i < $S; $i++) {
    // 前後の空白を除き、単語ごとのスペースで区切り、それを配列として格納
    $wordList[] = explode(" ", trim(fgets(STDIN)));
}

// 選ばれた単語の数を入力
$N = intval(fgets(STDIN));

// 選ばれた単語を入力
$selectedWords = [];
for ($i = 0; $i < $N; $i++) {
    $selectedWords[] = trim(fgets(STDIN));
}

// ビンゴを判定して結果を出力
if (isBingo($wordList, $selectedWords)) {
    echo "yes\n";
} else {
    echo "no\n";
}
?>
