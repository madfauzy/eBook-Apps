const deleteEbook = document.querySelector(".delete-ebook");
const keyword = document.getElementById("keyword");
const listEbook = document.querySelector("main");

deleteEbook.addEventListener('click',function(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = deleteEbook.getAttribute("href");
        }
    })
    return false;
});

keyword.addEventListener("keyup",function(){
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            listEbook.innerHTML = xhr.responseText;
        }
    }

    xhr.open("GET","assets/ajax/ebooks.php?keyword=" + keyword.value,true);
    xhr.send();
});