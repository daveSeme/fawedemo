// JavaScript Document
function checkAddUserForm()
{
    with (window.document.frmAddUser) {
        if (isEmpty(txtUserName, 'Enter user name')) {
            return;
        } else if (isEmpty(txtPassword, 'Enter password')) {
            return;
        } else {
            submit();
        }
    }
}

// go back
function goBack()
{
    window.history.back(1)
}

// export function pdf , print , excel , word , email etc
function exportExcel(pid, lid)
{
    window.location.href = 'export.php?type=excel&project_id=' + pid + '&division_id=' + lid;
}

function exportWord(pid, lid)
{
    window.location.href = 'export.php?type=word&project_id=' + pid + '&division_id=' + lid;
}

function exportPdf(pid, lid)
{
    window.location.href = 'export.php?type=pdf&project_id=' + pid + '&division_id=' + lid;
}

function email(pid, lid)
{
    window.location.href = 'export.php?type=email&project_id=' + pid + '&division_id=' + lid;
}

function print(pid, lid)
{
    mywindow = window.open("print.php?project_id=" + pid + '&division_id=' + lid + "", "mywindow", "location=1,status=1,scrollbars=1,  width=600,height=600");
}

function add(pid, lid)
{
    window.location.href = 'index.php?view=add&project_id=' + pid + '&division_id=' + lid + '&showsave=1';
}

function del_rec(id, pid, lid)
{
    if (confirm('Are you sure you want to permanently delete these record!')) {
        window.location.href = 'index.php?view=delete&project_id=' + pid + '&division_id=' + lid + '&id=' + id;
    }
}

// edit record
function edit(id, pid, lid)
{
    if (confirm("Are you sure you want to edit record!"))
    {
        window.location.href = 'index.php?view=modify&project_id=' + pid + '&division_id=' + lid + '&showedit=1&id=' + id;
    }
}

function del_rec_1(page)
{
	
	 Swal.fire(
                    {
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, delete it!"
                    }).then(function(result)
                    {
                        if (result.value)
                        {
                           // Swal.fire("Deleted!", "Your file has been deleted.", "success");
							$(location).attr('href',page);
                        }
                    });
	 
   // if (confirm('Are you sure you want to permanently delete these record!')) {
      //  window.location.href = page;
  //  }
	
	
	
}

// edit record
function edit1(page)
{
	
	
	   Swal.fire(
                    {
                        title: "Are you sure?",
                        text: "you want to edit this record!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, edit it!"
                    }).then(function(result)
                    {
                        if (result.value)
                        {
                           // Swal.fire("Deleted!", "Your file has been deleted.", "success");
							$(location).attr('href',page);
                        }
                    });
   
}

//review_data
function review_data(page)
{
    if (confirm("Are you sure you want to review the selected report?"))
    {
        window.location.href = page;
    }
}

function approve(active, user_id, pid, lid)
{

    if (active == 1)
    {
        if (confirm('Are you sure you want to disapprove the selected records?')) {
            window.location.href = 'active.php?user_id=' + user_id + '&project_id=' + pid + '&active=' + active + '&division_id=' + lid + ''
        }
    }

    if (active == 0)
    {
        if (confirm('Are you sure you want to approve the selected records?')) {
            window.location.href = 'active.php?user_id=' + user_id + '&project_id=' + pid + '&active=' + active + '&division_id=' + lid + ''
        }
    }
}