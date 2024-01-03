function resetError() {
    $(".is-invalid").removeClass("is-invalid");
    $(".invalid-feedback").html("");
}

export { resetError };
