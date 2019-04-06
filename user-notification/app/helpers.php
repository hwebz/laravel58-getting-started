<?php

// composer dump-autoload

function flash($message) {
    session()->flash('message', $message);
}
