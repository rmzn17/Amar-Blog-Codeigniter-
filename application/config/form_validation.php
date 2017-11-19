<?php

$config = [
'article_rules' => [
                                    [
                                    'field' => 'title',
                                     'label' => 'Title',
                                     'rules' => 'trim|required|alpha_numeric_spaces'
                                    ],
                                     [
                                    'field' => 'description',
                                     'label' => 'description',
                                     'rules' => 'trim|required|alpha_numeric_spaces',
                                    ]
                        ]
        ];