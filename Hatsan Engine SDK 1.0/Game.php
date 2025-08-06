<?php
require_once 'HatsanEngine.php';

function myStartScene() {
    echo "This is a custom start scene!\n";
}
// Here some sample code
HatsanEngine::init();
HatsanEngine::SetWindowTitle("Game tilte");
HatsanEngine::SetDialogue("Your dialogue");
HatsanEngine::AddCharacter("Your character name");
HatsanEngine::Button("Start", "myStartScene");
HatsanEngine::Button("Exit", "ExitGame");
HatsanEngine::run();
?>
