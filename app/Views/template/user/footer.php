<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Cat Care 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script>
            // Show the success modal and animate it
            $('#successModal').on('show.bs.modal', function () {
                $('.checkmark-circle').addClass('animate__animated animate__zoomIn');
                $('.checkmark').addClass('animate__animated animate__zoomIn');
            });
        </script>
        <script>
          // Get the current date
          var currentDate = new Date();

          // Format the date as YYYY-MM-DD
          var formattedDate = currentDate.toISOString().split('T')[0];

          // Set the value of the date input field
          document.getElementById("tgl_transaksi").value = formattedDate;
      </script>
        <script>
            function confirmDelete(serviceId) {
                if (confirm("Are you sure you want to delete this service?")) {
                    // Redirect to the delete route with the service ID
                    window.location.href = "<?= base_url('admin/delete_service/') ?>" + serviceId;
                }
            }
        </script>
        <script>
          const currencyInput = document.getElementById('currencyInput');
          
          // Listen for input event
          currencyInput.addEventListener('input', function() {
            // Remove non-digit characters from the input value
            const inputValue = this.value.replace(/[^0-9]/g, '');
            
            // Format the input value as IDR currency
            const formattedValue = formatCurrency(inputValue);
            
            // Set the formatted value as the input value
            this.value = formattedValue;
          });
          
          // Function to format the input value as IDR currency
          function formatCurrency(value) {
            // Convert the value to a number and divide by 100 to get the decimal part
            const decimalPart = Number(value) / 100;
            
            // Format the decimal part with comma separator and 2 decimal places
            const formattedDecimalPart = decimalPart.toLocaleString('id-ID', {
              minimumFractionDigits: 2,
              maximumFractionDigits: 2
            });
            
            // Return the formatted currency value
            return `IDR ${formattedDecimalPart}`;
          }
        </script>

        <!-- <script>
          $(document).ready(function() {
            $('#currencyInput').maskMoney({
              prefix: 'IDR ',
              thousands: '.',
              decimal: ','
            });
          });
        </script> -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('') ?>/admin/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('') ?>/admin/assets/demo/chart-area-demo.js"></script>
        <script src="<?= base_url('') ?>/admin/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('') ?>/admin/assets/demo/datatables-demo.js"></script>
    </body>
</html>
