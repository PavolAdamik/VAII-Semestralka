<?php

interface IStorage
{
    public function getAllData();
    public function  store(Question $question);
}