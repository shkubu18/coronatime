<?php

return [
	'required'    => 'გთხოვთ შეიყვანოთ :attribute',
	'min'         => [
		'string' => ':attribute უნდა შედგებოდეს მინიმუმ :min სიმბოლოსგან',
	],
	'unique'        => ':attribute უკვე დაკავებულია',
	'exists'        => 'ასეთი :attribute არ არსებობს',
	'same'          => ':attribute არ ემთხვევა პაროლს',
	'email'         => 'გთხოვთ შეიყვანოთ ვალიდური ელ-ფოსტის მისამართი',
	'required_with' => 'გთხოვთ შეავსოთ :attribute',
	'attributes'    => [
		'username'                          => 'მომხმარებლის სახელი',
		'email'                             => 'ელ-ფოსტა',
		'password'                          => 'პაროლი',
		'password_confirmation'             => 'განმეორებითი პაროლი',
		'username_or_email'                 => 'მომხმარებლის სახელი ან ელ-ფოსტა',
	],
];
