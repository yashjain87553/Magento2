var config = {
    paths: {
        'c-bootstrap': 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle',
        'c-custom': 'Magento_Theme/js/custom',
        'c-owl-crousel': 'Magento_Theme/js/owl.carousel.min'
    },
    shim: {
        'c-bootstrap': {
            'deps': ['jquery']
        },
        'c-owl-crousel': {
            'deps': ['jquery']
        }
    }
};