$(document).ready(function(){ 
 // affichage formulaire  pour inscrire un parent d'eleve  
           $('#inscription').click(function(){
              $('#formulaireInscription').css('display','block');
              $('#formulaireInscription').show();
              $('#liste_parent_eleves').hide();
           
           });
               //   recuper  les valeurs du champs formulaire nouveau client  
           $('#EnregisterParent').click(function(){
               var civility =$('#option').val(); 
               var firstName =$('#firstName').val(); 
               var lastName =$('#lastName').val();
               var phone =$('#telephone').val(); 
               var email =$('#email').val(); 
               var adresse =$('#adresse').val(); 
               
               //    appel AJAX pour ajouter un nouvelle personne 
                $.ajax
               ({
               url:'/inscriptionPrent',
               method:'POST',
               data:{ 
                   'civility':civility,
                   'nom':firstName,
                   'prenom':lastName,
                   'phone':phone,
                   'email':email,
                   'adresse':adresse,
    
               },
               dataType:'JSON',
               success :function(data){
               
               
               } 
             });
   
           });
        });

        // inscription eleve avec id parent 
        $(document).ready(function(){ 
          // affichage formulaire  pour inscrire un d'eleve  
                 $('.ajouterEleve').click(function(){
                  var idParent =$(this).attr('value');  
                    
                    $('#inscriptionEleve').css('display','block');
                    $('#inscriptionEleve').show();
                    $('#formulaireInscription').css('display','none');
                    $('#formulaireInscription').hide();
                    $('#liste_parent_eleves').hide();
                
                 
                     //   recuper  les valeurs du champs formulaire nouveau client  
                 $('#EnregisterEleve').click(function(){
                   
                     
                     var sexe =$('#optionGener').val(); 
                     var nom =$('#nom').val(); 
                     var prenom =$('#prenom').val();
                     var dateNaissance =$('#date').val(); 
                     alert(dateNaissance);
                     var classe =$('#optionClasse').val(); 
                     alert(classe);
                     var image =$('#image').val(); 
                     var ficheInscription =$('#ficheInscription').val();
                    
                     //    appel AJAX pour ajouter un nouvelle personne 
                      $.ajax
                     ({
                     url:'/inscriptionEleve',
                     method:'POST',
                     data:{ 
                         'idParent':idParent,
                         'sexe':sexe,
                         'nom':nom,
                         'prenom':prenom,
                         'dateNaissance':dateNaissance,
                         'classe':classe,
                         'image':image,
                         'ficheInscription':ficheInscription,
          
                     },
                     dataType:'JSON',
                     success :function(data){
                     
                     
                     } 
                   });
         
                 });
              });
            });

//ajouter un paiement  d'un parent d'eleve 
        $(document).ready(function(){ 
          // affichage formulaire  pourenregister une paiement   
                 $('.ajouterPaiement').click(function(){
                  var idParent =$(this).attr('value');
                  alert(idParent);
                    $('#inscriptionEleve').css('display','none');
                    $('#inscriptionEleve').hide();
                    $('#formulaireInscription').css('display','none');
                    $('#formulaireInscription').hide();
                    $('#liste_parent_eleves').hide();
                    $('#formulairPaiment').css('display','block');
                    $('#formulairPaiment').show();
                    formulairPaiment
                 
                     //   recuper  les valeurs du champs formulaire nouveau client  
                 $('#EnregisterPaiement').click(function(){
                   
                     
                     var typePaiement =$('#optionPaiement').val(); 
                     var datePaiement =$('#datePaiment').val(); 
                     var montantPaiement =$('#paiement').val();
                     
                    
                     //    appel AJAX pour ajouter un eleve
                      $.ajax
                     ({
                     url:'/ajouterPaiement',
                     method:'POST',
                     data:{ 
                         'idParent':idParent,
                         'typePaiement':typePaiement,
                         'datePaiement':datePaiement,
                         'montantPaiement':montantPaiement,
                         
                     },
                     dataType:'JSON',
                     success :function(data){
                     
                     
                     } 
                   });
         
                 });
              });
            });

// appale ajax pour inscription  enseignants
     $(document).ready(function(){ 
              // affichage formulaire  pour inscrire ensignant  
                     $('#Nouveau_Enseignant').click(function(){
                        $('#form_Insc_Enseigant').css('display','block');
                        $('#form_Insc_Enseigant').show();
                        $('#liste_enseignant').hide();
                     
                     });
              //   recuper  les valeurs du champs formulaire nouveau Enseigant  
                     $('#EnregisterEnseignant').click(function(){ 
                         var firstName =$('#firstNameE').val(); 
                         var lastName =$('#lastNameE').val();
                         var phone =$('#telephoneE').val(); 
                         var email =$('#emailE').val(); 
                         var contrat =$('#optionContrat').val();  
                         var classe =$('#optionClasse').val(); 
                         //    appel AJAX pour ajouter un nouvelle personne 
                          $.ajax
                         ({
                         url:'/ajouterEnseignants',
                         method:'POST',
                         data:{ 
                            
                             'nom':firstName,
                             'prenom':lastName,
                             'phone':phone,
                             'email':email,
                             'contrat':contrat,
                             'classe':classe
              
                         },
                         dataType:'JSON',
                         success :function(data){
                         
                         
                         } 
                       });
             
                     });
                  });