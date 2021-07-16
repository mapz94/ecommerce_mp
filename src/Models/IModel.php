<?php

interface IModel{
    public function selectAll();
    public function selectOne($id);
    public function deleteOne();
    public function updateOne($id, $model);
    public function insertOne($model);
}