<?=view::factory('components/top_gallery')?>

<section class="container">
  <h2 class="bar orange bebas">Contact</h2>

  <div class="article-content">

    <div class="text">

      <h3 class="bebas">Unde ne găsiți?</h3>
      <p>
        Ne puteți găsi pe adresa contact[at]caravanacumedici.ro, vă invităm să completați formularul de mai jos:
      </p>
    </div>

    <? if (false): ?>
  	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2848.6599927441275!2d26.082634600818675!3d44.44013627000384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDTCsDI2JzI0LjUiTiAyNsKwMDUnMDIuMiJF!5e0!3m2!1sen!2sro!4v1455456254001" width="100%" height="290" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <? endif; ?>

  <form class="contact-form" action="#contact-form" id="contact-form" method="post" name="contactForm">

    <div class="row">
      <div class="form-group col-md-4">
        <div class="form-group <?=(!empty($errors['name']))? 'has-error' : ''?> required">
          <label class="control-label" translate="">Nume</label><input value="<?=(!empty($values['name']))? $values['name'] : ''?>" class="form-control" name="contact[name]" type="text" placeholder="Numele dvs.">
        </div>
      </div>

      <div class="form-group col-md-4">
        <div class="form-group <?=(!empty($errors['email']))? 'has-error' : ''?> required">
          <label class="control-label" translate="">Adresa de email</label><input value="<?=(!empty($values['email']))? $values['email'] : ''?>" class="form-control" name="contact[email]" type="email" placeholder="Adresa dvs. de email">
        </div>
      </div>

      <div class="form-group col-md-4">
        <div class="form-group <?=(!empty($errors['phone']))? 'has-error' : ''?> required">
          <label class="control-label" translate="">Telefon</label><input value="<?=(!empty($values['phone']))? $values['phone'] : ''?>" class="form-control" name="contact[phone]" type="tel" placeholder="Numarul dvs. de telefon">
        </div>
      </div>

      <div class="form-group col-md-12">
        <div class="form-group <?=(!empty($errors['subject']))? 'has-error' : ''?> required">
          <label class="control-label" translate="">Subiect</label><input value="<?=(!empty($values['subject']))? $values['subject'] : ''?>" class="form-control" name="contact[subject]" type="text" placeholder="">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-12">
        <div class="form-group <?=(!empty($errors['message']))? 'has-error' : ''?> required">
          <label class="control-label">Mesaj</label>
          <textarea class="form-control"  name="contact[message]" rows="5" placeholder="Adaugati mesajul dvs. aici..."><?=(!empty($values['message']))? $values['message'] : ''?></textarea>
        </div>
      </div>
    </div>

    <? if (!empty($messageSent)): ?>
      <div class="alert alert-warning">

        <p>
          <strong>Va multumim!</strong> Mesajul dvs. a fost trimis cu succes.
        </p>
      </div>
    <? endif; ?>

      <button class="btn btn-lg center-block btn-default btn-md text-center" type="submit">Trimite</button>
  </form>

  </div>
</section>

<?=view::factory('components/contactBar')?>
