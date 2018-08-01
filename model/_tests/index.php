<?php

$order = new Order();

Test::assertFalse($order->fetch(100), 'order->fetch non existent id');
Test::assertFalse($order->fetch('foo'), 'order->fetch string as id');

Test::assertTrue($order->fetch(1), 'order->fetch existing id');
Test::assertTrue($order->get('notes'), 'order->get existing prop');

Test::assertFalse($order->set('foo', 'bar'), 'order->set non existent prop');
Test::assertTrue($order->set('notes', 'foobar'), 'order->set existing prop');
Test::assertFalse($order->set('notes', 100), 'order->set existing prop STRING type mistmatch');
Test::assertFalse($order->set('automobile_id', 'foobar'), 'order->set existing prop INT type mistmatch');
Test::assertFalse($order->set('_id', 0), 'order->set reserved prop');
