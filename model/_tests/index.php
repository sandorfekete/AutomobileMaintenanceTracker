<?php

$order = new Order();

Test::assertFalse($order->fetch(99999), 'order->fetch non existent id');
Test::assertFalse($order->fetch('foo'), 'order->fetch string as id');

Test::assertTrue($order->fetch(1), 'order->fetch existing id');
Test::assertTrue($order->get('notes'), 'order->get existing prop');

Test::assertFalse($order->set('foo', 'bar'), 'order->set non existent prop');
Test::assertTrue($order->set('notes', 'foobar'), 'order->set existing prop');
Test::assertFalse($order->set('notes', 100), 'order->set existing prop STRING type mistmatch');
Test::assertFalse($order->set('automobile_id', 'foobar'), 'order->set existing prop INT type mistmatch');
Test::assertFalse($order->set('_id', 0), 'order->set reserved prop');

echo '<br>';

$automobile = new Automobile();

Test::assertFalse($automobile->fetch(99999), 'automobile->fetch non existent id');
Test::assertFalse($automobile->fetch('foo'), 'automobile->fetch string as id');

Test::assertTrue($automobile->fetch(1), 'automobile->fetch existing id');
Test::assertTrue($automobile->get('plate'), 'automobile->get existing prop');

Test::assertFalse($automobile->set('foo', 'bar'), 'automobile->set non existent prop');
Test::assertTrue($automobile->set('model', 'GTR'), 'automobile->set existing prop');
Test::assertFalse($automobile->set('plate', 100), 'automobile->set existing prop STRING type mistmatch');
Test::assertFalse($automobile->set('odometer', '00AA00'), 'automobile->set existing prop INT type mistmatch');
Test::assertFalse($automobile->set('_id', 0), 'automobile->set reserved prop');
