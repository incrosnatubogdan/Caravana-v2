<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Class Model_Event
 * @property mixed id
 */
class Model_Contact_Message extends ORM
{

  /**
   * Add a contact message
   * @param [] $data
   */
  public function addMessage($data) {

      $this->date = date('Y-m-d');
      $this->name = $data['name'];
      $this->email = $data['email'];
      $this->phone = $data['phone'];
      $this->subject = $data['subject'];
      $this->message = $data['message'];

      $this->save();
  }

}
