function showForm(formId){
    document.querySelectorAll("form-box").forEach(form=>form.classList.remove("active"));
    document.getElementById("form-box").classList.add("active");
}