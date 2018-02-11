<?php

function deleteObject($id = '', $table = '')
{
	$sql = "DELETE FROM $table WHERE id='$id'";
}