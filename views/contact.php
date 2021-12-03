<div class="container">
  <h3 class="text-center">Formulaire de contact</h3>
  <h4 class="text-center">Nous donnerons suite à votre demande dans les 48h maximum.</h4>
  <div class="container">
    <div class="row ">
      <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
          <div class="card-body bg-light">
            <div class="container">
              <form id="contact-form" role="form">
                <div class="controls">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group"> <label for="form_name">Prénom</label> <input id="form_name" type="text"
                          name="name" class="form-control" placeholder="Entrez votre prénom." required="required"
                          data-error="Votre prénom est requis."> </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> <label for="form_lastname">Nom</label> <input id="form_lastname"
                          type="text" name="surname" class="form-control" placeholder="Entrez votre nom."
                          required="required" data-error="Votre nom est requis."> </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group"> <label for="form_email">Email</label> <input id="form_email" type="email"
                          name="email" class="form-control" placeholder="Entrez votre adresse email."
                          required="required" data-error="Une adresse email vaide est requise."> </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> <label for="form_need">Objet de votre demande</label> <select
                          id="form_need" name="need" class="form-control" required="required"
                          data-error="Spécifiez votre demande.">
                          <option value="" selected disabled>--Selectionnez un choix--</option>
                          <option>Une question</option>
                          <option>Une réclamation</option>
                          <option>Autre</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"> <label for="form_message">Message</label> <textarea id="form_message"
                          name="message" class="form-control" placeholder="Ecrivez votre message ici." rows="4"
                          required="required" data-error="Please, leave us a message."></textarea> </div>
                    </div>
                    <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block"
                        value="Envoyer"> </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div> <!-- /.8 -->
      </div> <!-- /.row-->
    </div>
  </div>
</div>