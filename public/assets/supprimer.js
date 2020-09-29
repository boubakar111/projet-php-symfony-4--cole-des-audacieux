$(document).ready(function(){ 
   
//appel ajax pour supprimer un Enseignant  avec son ID
    $('.suprmierEnseignant').click(function(){
            var id =$(this).attr('value');  
    
              $.ajax
              ({
              url:'/supprimerEnseignant/{id}',
              method:'POST',
              data:{id:id},
              dataType:'JSON',
              success :function(data){
            } 
          });
        });

//appel ajax pour supprimer un parent d'eleve avec son ID
        $('.suprmierParentEleve').click(function(){
             var id =$(this).attr('value');  

              $.ajax
              ({
              url:'/supprimerParentEleve/{id}',
              method:'POST',
              data:{id:id},
              dataType:'JSON',
              success :function(data){
            } 
          });
        });

        //appel ajax pour supprimer un eleve avec son ID
        $('.suprmierEleve').click(function(){
             var id =$(this).attr('value');  

              $.ajax
              ({
              url:'/supprimerEleve/{id}',
              method:'POST',
              data:{id:id},
              dataType:'JSON',
              success :function(data){
            } 
          });
        });



});