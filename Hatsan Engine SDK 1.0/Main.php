<?php
if (!class_exists('Gtk')) {
    die("Please run this script with php-gtk2.\n");
}

class HatsanEngine {
    public static $window;
    public static $vbox;

    public static function init() {
        self::$window = new GtkWindow();
        self::$window->set_size_request(300, 300);
        self::$window->connect_simple('destroy', array('Gtk', 'main_quit'));

        self::$vbox = new GtkVBox();

        if (file_exists('logo.png')) {
            $image = GtkImage::new_from_file('logo.png');
            self::$vbox->pack_start($image, false, false);
        }
    }

    public static function SetWindowTitle($title) {
        self::$window->set_title($title);
    }

    public static function Button($label, $eventFunc) {
        $button = new GtkButton($label);
        $button->connect_simple('clicked', function() use ($eventFunc) {
            if (is_callable($eventFunc)) {
                $eventFunc();
            } elseif (method_exists('HatsanEngine', $eventFunc)) {
                HatsanEngine::$eventFunc();
            } else {
                echo "Event function '$eventFunc' not found\n";
            }
        });
        self::$vbox->pack_start($button, false, false);
    }

    public static function SetDialogue($text) {
        $label = new GtkLabel($text);
        self::$vbox->pack_start($label, false, false);
    }

    public static function AddCharacter($name) {
        $label = new GtkLabel("Character: $name appears");
        self::$vbox->pack_start($label, false, false);
    }

    public static function run() {
        self::$window->add(self::$vbox);
        self::$window->show_all();
        Gtk::main();
    }

    // Optional defaults
    public static function StartGame() {
        echo "Info : Starting game\n";
    }

    public static function ExitGame() {
        echo "Info : Exiting game\n";
        Gtk::main_quit();
    }
}
?>
