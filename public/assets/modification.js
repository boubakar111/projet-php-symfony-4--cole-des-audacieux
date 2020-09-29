 //function pour modifier  infoamtion parent_eleve

          $(document).ready(function(){ 
          $('.modifierParent').click(function(){
              var id =$(this).attr('value');  
                         
                  $('#inscriptionEleve').css('display','none');
                  $('#inscriptionEleve').hide();
                  $('#formulaireInscription').css('display','none');
                  $('#formulaireInscription').hide();
                  $('#liste_parent_eleves').hide();
                  $('#formulaireModificationParent').show();
                
              
              $.ajax
              ({
              url:'/informationParent',
              method:'POST',
              data:{id:id},
              dataType:'JSON',
              success :function(data){
              
                $("#MfirstName").val(data.nom);
                $("#MlastName").val(data.prenom);
                $("#Memail").val(data.email);
                $("#Mtelephone").val(data.telephone);
                $("#Madresse").val(data.adresse);
                $("#Mid").val(data.id);
              } 
          });

          });

          //function save after  update

          $('#MEnregisterParent').click(function() {

            var id =$("#Mid").val();  
               
          var nom =$('#MfirstName').val();
          var prenom=$("#MlastName").val();  
          var email=$("#Memail").val();  
          var telephone =$('#Mtelephone').val();
          var adresse=$("#Madresse").val();  
          var civilite=$("#optionCivilite").val()
        
          //ajax processing and sending the request to controllor by url indicates
          $.ajax
          ({
          url: 'updateParent/{id}',
          type: "POST",
          dataType:'JSON',
          data:{
          // recovering fields from the form customer o inser
                'id':id,
                'nom':nom,
                'prenom':prenom,
                'email':email,
                'telephone':telephone,
                'adresse':adresse,
                'civilite':civilite,
              }, 
                success: function(data){ 
                  if(data!= null){
                    alert('bien modifier ');
                  swal("insert !", "It was succesfully inserted!", "success");
                  }else{
                  swal("insert!", "It was not inserted!", "!!!!!");
                  }
                }
            })
            })
          });
///////////////////////////////////////enseignants action /////////////////////////////////
//function pour modifier INFORMATION Enseignant

          $(document).ready(function(){ 
            $('.modifierEnseignant').click(function(){
                    var id =$(this).attr('value');  
                  $('#form_Insc_Enseigant').css('display','none');
                  $('#form_Insc_Enseigant').hide();
                  $('#liste_enseignant').css('display','none');
                  $('#liste_enseignant').hide();
                  $('#form_modif_Enseigant').show();
                  
              
              $.ajax
              ({
              url:'/informationEnseignant',
              method:'POST',
              data:{id:id},
              dataType:'JSON',
              success :function(data){
              
                $("#Mid").val(data.id);
                $("#MfirstNameE").val(data.nom);
                $("#MlastNameE").val(data.prenom);
                $("#MemailE").val(data.email);
                $("#MtelephoneE").val(data.telephone);
                
              } 
            });
          
          });
          
          //function save after  update
          
          $('#enregister_modif_enseignant').click(function() {
          
          var id =$("#Mid").val();     
          var nom =$('#MfirstNameE').val();
          var prenom=$("#MlastNameE").val();  
          var email=$("#MemailE").val();  
          var telephone =$('#MtelephoneE').val();
          var contrat=$("#MoptionContrat").val();  
          var classe=$("#MoptionClasse").val()

          //ajax processing and sending the request to controllor by url indicates
          $.ajax
          ({
          url: 'modifierEnseignant/{id}',
          type: "POST",
          dataType:'JSON',
          data:{
          // recovering fields from the form customer o inser
                  'id':id,
                'nom':nom,
                'prenom':prenom,
                'email':email,
                'telephone':telephone,
                'contrat':contrat,
                'classe':classe,
                }, 
                success: function(data){ 
                    if(data!= null){
                     
                    swal("insert !", "It was succesfully inserted!", "success");
                    }else{
                    swal("insert!", "It was not inserted!", "!!!!!");
                    }
                }
              })
            })
          });

////////////////////////////////////action eleves ////////////////////////////////////////////////////
//fonction pour modifier  les informations eleve
          $(document).ready(function(){ 
            $('.modifier_info_eleve').click(function(){
                 var idEleve =$(this).attr('value');
                  $('#liste_eleves_classe').hide();
                  $('#formulaire_modif_eleve').show();
                  
              
              $.ajax
              ({
              url:"informationEleve",
              method:'POST',
              data:{id:idEleve},
              dataType:'JSON',
              success :function(data){
              
                $("#MID").val(data.id);
                $("#Mnom").val(data.nom);
                $("#Mprenom").val(data.prenom);
               
                
              } 
            });
          
          });
          
          //function save after  update
          
          $('#enregister_modif_eleve').click(function() {

              var id =$("#MID").val();  
              var geners =$("#MoptionGener").val();  
              var name =$('#Mnom').val();
              var prenom=$("#Mprenom").val();  
              var date=$("#Mdate").val();  
              var classe=$("#MoptionClasse").val();  
              var image=$("#Mimage").val();
              var pdf=$("#MficheInscription").val();
            
          //ajax processing and sending the request to controllor by url indicates
          $.ajax
          ({
          url: "modifierEleve/{id}",
          type: "POST",
          dataType:'JSON',
          data:{
          // recovering fields from the form customer o inser
                'id':id,
                'gener':geners,
                'nomEleve':name,
                'prenom':prenom,
                'date':date,
                'classe':classe,
                'image':image,
                'pdf':pdf,
                }, 
                success: function(data){ 
                    if(data!= null){
                      alert('bien modifier ');
                    swal("insert !", "It was succesfully inserted!", "success");
                    }else{
                    swal("insert!", "It was not inserted!", "!!!!!");
                    }
                }
              })
            })
          });

          