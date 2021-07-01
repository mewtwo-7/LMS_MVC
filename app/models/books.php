<?php

namespace Model;

class Books
{

  public static function findAvailable()
  {
    $db = \DB::get_instance();
    $Sth = $db->prepare("SELECT * FROM books WHERE owner=?");
    $Sth->execute(["Admin"]);

    $Result = $Sth->fetchAll();
    return $Result;
  }

  public static function addBook($name,$author,$publisher,$isbn,$Genre)
  {

    $db = \DB::get_instance();
    $stmt = $db->prepare("INSERT INTO books (name,author,publisher,isbn,Genre,owner) VALUES (?,?,?,?,?,?)");
    $stmt->execute([$name,$author,$publisher,$isbn,$Genre,"Admin"]);

    return;
  }

  public static function requestBook($requester,$book)
  {

    $db = \DB::get_instance();
    $stmt = $db->prepare("INSERT INTO request (bookname,request) VALUES (?,?)");
    $stmt->execute([$book,$requester]);

    return;
  }
  public static function seerequest()
  {
    $db = \DB::get_instance();
    $Sth = $db->prepare("SELECT * FROM request");
    $Sth->execute();

    $Result = $Sth->fetchAll();
    return $Result;
  }

  public static function approve($bookname,$request)
  {
    $db = \DB::get_instance();
    $Sth = $db->prepare("Delete From request where request = ?");
    $Sth->execute([$request]);
    $fth =  $db->prepare("Update books Set owner = ? where name = ?");
    $fth->execute([$request,$bookname]);
  }
  public static function isavail($bookname)
  {
    $db = \DB::get_instance();
    $Sth = $db->prepare("SELECT * FROM books Where name = ? ");
    $Sth->execute([$bookname]);
    $Result = $Sth->fetch();
    $owner = $Result["owner"];
    return $owner;
  }
  public static function seebooks($user)
  {
    $db = \DB::get_instance();
    $Sth = $db->prepare("SELECT * FROM books Where owner = ?");
    $Sth->execute([$user]);

    $Result = $Sth->fetchAll();
    return $Result;
  }
  public static function seebook()
  {
    $db = \DB::get_instance();
    $Sth = $db->prepare("SELECT * FROM books");
    $Sth->execute();

    $Result = $Sth->fetchAll();
    return $Result;
  }
  public static function returnbook($bookname)
  {
    $db = \DB::get_instance();
    $Sth = $db->prepare("Update books Set owner = 'Admin' where name = ?");
    $Sth->execute([$bookname]);
  }
}