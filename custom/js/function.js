
$(document).ready(function(){	  
	   //...............................showing users.........................
			var data={'list_user':'list_user'}
			$.ajax({ url:"process.php",
				type:"post",
				data:data, 
				success : function (response) {
					
						 $("#dash-contant").html(response); 
				          $("#main_heading").html("<h4>Users Details</h4>")		 
				},
					error : function(bb) { 
						alert("page found success fullerrrorrrrr"); }
					});
			
	//.......................................
		$('#suggest').on('input',function(){		
		$.get("process.php", {search: $(this).val()}, function(data){			
			$("datalist").empty();
			$("datalist").html(data);
		});		
		var opt = $('#browsers option[value="'+$(this).val()+'"]');
		
		if(opt.data('id')!=undefined){
    	
		var data={'modify':opt.data('id')}; 
		$.ajax({ url:"process.php",
			type:"post",
			data:data, 
			success : function (response) {
				    
					 $("#main_contant").html(response); 
			         $("#main_heading").html("<h4> Modify"+" "+opt.val()+"</h4>")		 
			},
				error : function(bb) { 
					alert("page found success fullerrrorrrrr"); }
				});
		}
	});
		$('#suggestzoo').on('input',function(){		
			$.get("zooforms.php", {search: $(this).val()}, function(data){			
				$("datalist").empty();
				$("datalist").html(data);
			});	
			
			var opt = $('#listzoo option[value="'+$(this).val()+'"]');
			
			if(opt.data('id')!=undefined){
	    	
			var data={'viewzoo':opt.data('id')}; 
			$.ajax({ url:"zooforms.php",
				type:"post",
				data:data, 
				success : function (response) {
					    
						 $("#main_contant").html(response); 
				         $("#main_heading").html("<h4>"+" "+opt.val()+"</h4>")		 
				},
					error : function(bb) { 
						alert("page found success fullerrrorrrrr"); }
					});
			}
		});
		
		$('#suggestAnimal').on('input',function(){		
			$.get("animalforms.php", {searchanimal: $(this).val()}, function(data){			
				$("#datalistanimals").empty();
				$("#datalistanimals").html(data);
			});	
			
			var opt = $('#datalistanimals option[value="'+$(this).val()+'"]');
			
			if(opt.data('id')!=undefined){
	    	
			var data={'listanimals':opt.data('id')}; 
			$.ajax({ url:"animalforms.php",
				type:"post",
				data:data, 
				success : function (response) {
					    
						 $("#main_contant").html(response); 
				         $("#main_heading").html("<h4>"+" "+opt.val()+"</h4>")		 
				},
					error : function(bb) { 
						alert("page found success fullerrrorrrrr"); }
					});
			var data={'animaltype':'animaltype'};
			$.ajax({ url:"animalforms.php",
				type:"post",
				data:data, 
				success : function (response) {
						 $("#selecttype").append(response);		        	 
				},
					error : function(bb) { 
						alert("page found success fullerrrorrrrr"); }
					});
			var data={'zooselect':'zooselect'};
			$.ajax({ url:"animalforms.php",
				type:"post",
				data:data, 
				success : function (response) {
						 $("#zooselect").append(response);		        	 
				},
					error : function(bb) { 
						alert("page found success fullerrrorrrrr"); }
					});
			}
		});
});

//..................................ajex for adding new user.................
$("#add_user").click(function(e){
//	alert("function called");
//	var uemail=$("#uemail").val();
//	var upass=$("#upass").val(); 
	var name=$("#add_user").attr('name');  
	var data={'name':name}; 
	$.ajax({ url:"process.php",
		type:"post",
		data:data, 
		success : function (response) {
				 $("#main_contant").html(response); 
		          $("#main_heading").html("<h4>Add New User</h4>")		 
		},
			error : function(bb) { 
				alert("page found success fullerrrorrrrr"); }
			});
	});

//..................................ajex for new user registration form.................
$(document).on("click", '#addusersubmit', function(e)
{
	var fname=$("#fname").val();
	var lname=$("#lname").val(); 
	var address=$("#address").val();
	var zipcode=$("#zipcode").val();  
	var email=$("#email").val();
	var password=$("#password").val();
	var role=$("#role").val();
	var phoneno=$("#phoneno").val();
	var data={'addusersubmit':'addusersubmit','fname':fname,'lname':lname,'address':address,'zipcode':zipcode,'email':email,'password':password,'role':role,'phoneno':phoneno}; 

	$.ajax({ url:"process.php",
		type:"post",
		data:data, 
		success : function (response) {
			alert("successfully submited..");
//				 $("#main_contant").html(response); 
//		          $("#main_heading").html("<h4>"+name+"</h4>")		 
		},
			error : function(bb) { 
				alert("errrorrrrr in ajex"); }
			});
	});
	
//.................................................




$(document).on("click", '#modifyusersubmit', function(e){		
			var data=$("#modifyuser").serialize(); 
		
			$.ajax({ url:"formoperations.php",
				type:"post",
				data:data, 
				success : function (response) {
					
					$('.alert-normal-success').removeClass('hidden');
				},
					error : function(bb) { 
						$('.alert-normal-danger').removeClass('hidden'); }
					});
			});
//....................................list user.............................


$("#list_user").click(function(e){
//	alert("function called");
//	var uemail=$("#uemail").val();
	var data={'list_user':'list_user'}
	$.ajax({ url:"process.php",
		type:"post",
		data:data, 
		success : function (response) {
				 $("#main_contant").html(response); 
		          $("#main_heading").html("<h4>Users Details</h4>")		 
		},
			error : function(bb) { 
				alert("page found success fullerrrorrrrr"); }
			});
	});
//...................................
$('.add_zoo').click(function(e){
	var data={'add_zoo':'add_zoo'}
	$.ajax({ url:"zooforms.php",
		type:"post",
		data:data, 
		success : function (response) {
				 $("#main_contant").html(response); 
		          $("#main_heading").html("<h4>Add New</h4>")		 
		},
			error : function(bb) { 
				alert("page found success fullerrrorrrrr"); }
			});
});
//...................................add_zoo...................
$(document).on("click", '#addzoosubmit', function(e){
		
			var name=$("#zoo_name").val();
			var address=$("#zoo_address").val();
			var data={'addzoosubmit':'addzoosubmit','name':name,'address':address}; 
			$.ajax({ url:"formoperations.php",
				type:"post",
				data:data, 
				success : function (response) {
					alert("succefully submited.....");
//						 $("#main_contant").html(response); 
//				          $("#main_heading").html("<h4>"+name+"</h4>")		 
				},
					error : function(bb) { 
						alert("errrorrrrr in ajex"); }
					});
			});
			
//.................................................managezoo
$('#managezoo').click(function(e){
	
	var data={'manage_zoo':'manage_zoo'}
	$.ajax({ url:"zooforms.php",
		type:"post",
		data:data, 
		success : function (response) {
				 $("#main_contant").html(response); 
		          $("#main_heading").html("<h4>Manage Zoo</h4>")		 
		},
			error : function(bb) { 
				alert("page found success fullerrrorrrrr"); }
			});
	
	var data={'zoo_options':'zoo_options'}; 
	$.ajax({ url:"zooforms.php",
		type:"post",
		data:data, 
		success : function (response) {
			    
				 $("#selectedzoo").html(response); 
		         		 
		},
			error : function(bb) { 
				alert("page found success fullerrrorrrrr"); }
			});
	
	var data={'manager_options':'manager_options'}; 
	$.ajax({ url:"zooforms.php",
		type:"post",
		data:data, 
		success : function (response) {
			      
				 $("#selectedmanager").html(response); 
		         		 
		},
			error : function(bb) { 
				alert("page found success fullerrrorrrrr"); }
			});
	
});

//....................................manage Zoo submit................
$(document).on("click", '#managezoosubmit', function(e){
	var zooid= $('#selectedzoo option:selected').attr('name');
	var managerid= $('#selectedmanager option:selected').attr('name');
	if(zooid!=undefined || managerid!=undefined){

		var data={'selectedzooid':zooid,'selectedmanagerid':managerid}
		$.ajax({ url:"formoperations.php",
			type:"post",
			data:data, 
			success : function (response) {
				alert("succefully submited.....");			 
			},
				error : function(bb) { 
					alert("page found success fullerrrorrrrr"); }
				});
	}
	else{
		alert("select the required fields");
	}
	   
});
//......................................for deleting user from list...........................

$(document).on('click','.deteteuser',function(e){
	var id=this.id;
	var data={'deteteid':id};
	$.ajax({ url:"formoperations.php",
		type:"post",
		data:data, 
		success : function (response) {
			alert("succefully deleted.....");		 
		},
			error : function(bb) { 
				alert("page found success fullerrrorrrrr"); }
					});
	
		var data={'list_user':'list_user'};
		$.ajax({ url:"process.php",
			type:"post",
			data:data, 
			success : function (response) {
					 $("#main_contant").html(response); 
			          $("#main_heading").html("<h4>Users Details</h4>")		 
			},
				error : function(bb) { 
					alert("page found success fullerrrorrrrr"); }
				});
	
	   
});
//........................modify zoo details............................
$(document).on("click", '#modifyzoosubmit', function(e){		
	var data=$("#modifyzoo").serialize(); 

	$.ajax({ url:"formoperations.php",
		type:"post",
		data:data, 
		success : function (response) {
			
		$('.alert-normal-success').removeClass('hidden');
		},
			error : function(bb) { 
			$('.alert-normal-danger').removeClass('hidden'); }
			});
	});
$(document).on('click', '.close', function () {
	$(this).parent().hide();
});
//..............................zoo data...............
$(".zoodata").click(function(e){
	var data={'zoodata':'zoodata'};
	$.ajax({ url:"zooforms.php",
		type:"post",
		data:data, 
		success : function (response) {
				 $("#main_contant").html(response); 
		          $("#main_heading").html("<h4>Users Details</h4>")		 
		},
			error : function(bb) { 
				alert("page found success fullerrrorrrrr"); }
			});
});
//.............................adding animals................
$(".addanimal").click(function(){
	var data={'addanimal':'addanimal'};
	$.ajax({ url:"animalforms.php",
		type:"post",
		data:data, 
		success : function (response) {
				 $("#main_contant").html(response); 
		          $("#main_heading").html("<h4>Add Animal</h4>")		 
		},
			error : function(bb) { 
				alert("page found success fullerrrorrrrr"); }
			});
	
	
	var data={'animaltype':'animaltype'};
	$.ajax({ url:"animalforms.php",
		type:"post",
		data:data, 
		success : function (response) {
				 $("#selecttype").append(response);		        	 
		},
			error : function(bb) { 
				alert("page found success fullerrrorrrrr"); }
			});
	
	
	var data={'zooselect':'zooselect'};
	$.ajax({ url:"animalforms.php",
		type:"post",
		data:data, 
		success : function (response) {
				 $("#zooselect").append(response);		        	 
		},
			error : function(bb) { 
				alert("page found success fullerrrorrrrr"); }
			});
});
	$(document).on('click',"#addanimalsubmit",function(){
		var name=$("#animalname").val();
		var type=$('#selecttype option:selected').attr('name');
		var age=$("#age").val();
		var diet=$("#diet").val();
		var zooid=$('#zooselect option:selected').attr('name');
		var data={'animalname':name,'type':type,'age':age,'diet':diet,'zooid':zooid}		
		$.ajax({ url:"formoperations.php",
			type:"post",
			data:data, 
			success : function (response) {
					 alert("succefully submited.....");		        	 
			},
				error : function(bb) { 
					alert("page found success fullerrrorrrrr"); }
				});
	   
	});
	/**
	 * 
	 * @author 
	 * modify animals.................
	 * 
	 */
	$(document).on('click','#modifyanimalsubmit',function(){
		var id=$('#updateid').val();
		var zooid=$('#zooselect option:selected').attr('name');
		var typeid=$('#selecttype option:selected').attr('name');
		var id=$('#updateid').val()
		var age=$('#age').val();
		var animalname=$('#animalname').val();
		var diet=$('#diet').val();
		var data={'updatedanimalname':animalname,'selectedtype':typeid,'age':age,'diet':diet,'selectedzoo':zooid,'id':id};
		$.ajax({ url:"formoperations.php",
			type:"post",
			data:data, 
			success : function (response) {
					 alert("successfully updated");	        	 
			},
				error : function(bb) { 
					alert("page found success fullerrrorrrrr"); }
				});
		
	
	});
	
	/**
	 * 
	 * listing animals...................................
	 *
	 * 
	 * 
	 */
	
	
	$("#listAnimals").click(function(){
		
		var data={'list_animals':'list_animals'}
		$.ajax({ url:"animalforms.php",
			type:"post",
			data:data, 
			success : function (response) {
					 $("#main_contant").html(response); 
			          $("#main_heading").html("<h4>Users Details</h4>")		 
			},
				error : function(bb) { 
					alert("page found success fullerrrorrrrr"); }
				});
		
//		var data={'zooselect':'zooselect'};
//		$.ajax({ url:"animalforms.php",
//			type:"post",
//			data:data, 
//			success : function (response) {
//					 $("#zooselect").append(response);		        	 
//			},
//				error : function(bb) { 
//					alert("page found success fullerrrorrrrr"); }
//				});
	});
	
	//............................move click

	$(document).on('click','.transfer',function(){
		id=$(this).attr('data');
		$('.transferTo').attr('id',id);
         alert(id);
		var data={'zooselect':'zooselect'};
		$.ajax({ url:"animalforms.php",
			type:"post",
			data:data, 
			success : function (response) {
					 $("#zooselect").append(response);		        	 
			},
				error : function(bb) { 
					alert("page found success fullerrrorrrrr"); }
				});
	});
	
	
	//transfering animal..............................
	$(document).on('click','.transferTo',function(){
		var zooid= $('#zooselect option:selected').attr('name');
		var animalid=$('.transferTo').attr('id');
		var data={'transferanimal':zooid,'id':animalid};
		$.ajax({ url:"animalforms.php",
			type:"post",
			data:data, 
			success : function (response) {
//				location.reload(); 
				$('#myModal').modal('hide');
				//$('#your-modal-id').modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
			},
				error : function(bb) { 
					alert("page found success fullerrrorrrrr"); }
				});
	
		
	var data={'list_animals':'list_animals'}
		
		$.ajax({ url:"animalforms.php",
			type:"post",
			data:data, 
			success : function (response) {
					 $("#main_contant").html(response); 
			          $("#main_heading").html("<h4>Users Details</h4>")		 
			},
				error : function(bb) { 
					alert("page found success fullerrrorrrrr"); }
				});
		
	});
	//............................delete animal

	$(document).on('click','.deleteanimal',function(){
		var id=this.id;
		var data={'deleteanimal':id};
		$.ajax({ url:"formoperations.php",
			type:"post",
			data:data, 
			success : function (response) {
				var data={'list_animals':'list_animals'}
				
				$.ajax({ url:"animalforms.php",
					type:"post",
					data:data, 
					success : function (response) {
							 $("#main_contant").html(response); 
					          $("#main_heading").html("<h4>Users Details</h4>")		 
					},
						error : function(bb) { 
							alert("page found success fullerrrorrrrr"); }
						});
			},
				error : function(bb) { 
					alert("page found success fullerrrorrrrr"); }
						});
		
	});
	//...............................
	$(".logout").click(function(){
		var data={'logout':'logout'};
		$.ajax({ url:"formoperations.php",
			type:"post",
			data:data, 
			success : function (response) {
				if(response=='logouted'){
					
					 window.location.href = '/zms/index.php';
				}
				},
				error : function(bb) { 
					alert("page found success fullerrrorrrrr"); }
				});
	});
	