// Bootstrap Tooltips
const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Delete eBook Using jQuery
$(document).ready(function () {
    $(".delete-ebook").on("click",function () {
        const getLink = $(this).attr("href");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(result => {
            if(result.isConfirmed){
                window.location.href = getLink;
            }
        });
        return false;
    });
});

// Live Search
const keyword = document.getElementById("keyword");
const content = document.getElementById("content");

keyword.addEventListener("keyup",function () {
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200){
            content.innerHTML = xhr.responseText;
        }
    }

    xhr.open("GET",`search.php?keyword=${keyword.value}`,true);
    xhr.send();
});