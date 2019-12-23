<?php

$db_file = "db_file.dat";

class Record
{
    public $message;
    public $from;

    public function __construct(string $message, string $from)
    {
        $this->message = $message;
        $this->from = $from;
    }
}

function show_guest_book_form()
{
    $self_path = $_SERVER["PHP_SELF"];
    print<<<_HTML_GUEST_BOOK_
    <head>
        <title>Home</title>
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="expires" content="0">
    </head>
    <body>
        <form  method="post" action="$self_path">
        <table cellpadding="2" cellspacing="0" style="border: 1px solid;">
            <tbody>
                <tr>
                    <td align="right">Name:</td>
                    <td align="left">
                        <input type="text" name="msg_from" maxlength="40" size="30">
                    </td>
                </tr>
                <tr>
                    <td align="right">Message:</td>
                    <td align="left">
                        <textarea cols="45" rows="7" name="msg_message"></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input type="submit" value="Add">
                    </td>
                </tr>
            </tbody>
        </table>
        </form>
    </body>
    _HTML_GUEST_BOOK_;
}

function load_history()
{
    global $db_file;
    if (file_exists($db_file)) {
        $arr_serialized = file_get_contents($db_file);
        $arr = unserialize($arr_serialized);
        $arr = array_reverse($arr);

        foreach ($arr as $record) {
            print "From:" . $record->from . nl2br(PHP_EOL) ;
            print "Message:" . nl2br($record->message) . nl2br(PHP_EOL);
            print nl2br("<hr>");
        }
    } else {
        print "There are no record in database";
    }
}

function save_history(string $messgae, string $from)
{
    global $db_file;
    $arr = array();
    if (file_exists($db_file)) {
        $arr_serialized = file_get_contents($db_file);
        $arr = unserialize($arr_serialized);
    }

    $arr[] = new Record($messgae, $from);
    $arr_serialized = serialize($arr);
    file_put_contents($db_file, $arr_serialized);
}

if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    show_guest_book_form();
    save_history($_POST["msg_message"], $_POST["msg_from"]);
    load_history();
} else {
    show_guest_book_form();
    load_history();
}