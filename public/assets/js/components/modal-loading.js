function loading() {
    return `
    <div class="modal-content">
        <div class="modal-body d-flex justify-content-center align-items-center" style="min-height: 50vh;">
            <div class="spinner-border text-main" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    `;
}

export { loading };
