  <style>
    /* Toast animation */
    .animated-toast {
      animation: fadeInUp 0.5s ease, fadeOutDown 0.5s ease 3.5s forwards;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeOutDown {
      to {
        opacity: 0;
        transform: translateY(20px);
      }
    }

    /* Toast colors */
    .gritter-success {
      background: #22c55e !important;
      color: #fff !important;
    }

    .gritter-error {
      background: #ef4444 !important;
      color: #fff !important;
    }

    .gritter-warning {
      background: #f59e0b !important;
      color: #fff !important;
    }

    .gritter-info {
      background: #3b82f6 !important;
      color: #fff !important;
    }

    .gritter-light {
      border-radius: 8px;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
      font-weight: 500;
      padding: 12px 16px;
    }

    .gritter-light .gritter-title {
      font-size: 15px;
      margin-bottom: 4px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .gritter-light .gritter-item {
      border: none !important;
    }
  </style>

  <script>
    $(function() {
      const showToast = (type, title, text) => {
        let icon = '',
          className = '';
        switch (type) {
          case 'success':
            icon = '<i class="fa fa-check-circle"></i>';
            className = 'gritter-success';
            break;
          case 'error':
            icon = '<i class="fa fa-times-circle"></i>';
            className = 'gritter-error';
            break;
          case 'warning':
            icon = '<i class="fa fa-exclamation-triangle"></i>';
            className = 'gritter-warning';
            break;
          default:
            icon = '<i class="fa fa-info-circle"></i>';
            className = 'gritter-info';
        }

        $.gritter.add({
          title: icon + ' ' + title,
          text: text,
          class_name: className + ' gritter-light animated-toast',
          time: 4000,
        });
      };

      @if (session('success'))
        showToast('success', 'Success!', '{{ session('success') }}');
      @endif

      @if (session('error'))
        showToast('error', 'Error!', '{{ session('error') }}');
      @endif

      @if (session('warning'))
        showToast('warning', 'Warning!', '{{ session('warning') }}');
      @endif
    });
  </script>
