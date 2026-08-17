        </div><!-- end admin-content -->
    </div><!-- end admin-main -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs5.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
    $(document).ready(function() {
        // Initialize Summernote
        $('.summernote').summernote({
            height: 250,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
        
        // Initialize DataTables
        $('.dataTable').DataTable({
            pageLength: 25,
            responsive: true,
            order: [[0, 'desc']]
        });
        
        // Confirm delete
        $('.confirm-delete').on('click', function(e) {
            if (!confirm('Are you sure you want to delete this item? This action cannot be undone.')) {
                e.preventDefault();
            }
        });
        
        // Image preview
        $('input[type="file"][data-preview]').on('change', function() {
            const preview = $($(this).data('preview'));
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        });
    });
    </script>
</body>
</html>