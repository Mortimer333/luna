class Luna {
  static elargableClass = 'enlarge-enabled';
  static enlargeActive = 'enlarge-acitve';
  static imgEnlargeModal;
  static imgEnlargeModalImg;
  static form;
  static imgEnlargeModalId = 'enlarge-container';
  static init() {
    Luna.setupEnlarableImages();
    Luna.setupMenuLogoRsize();
    Luna.setupContactFrom();
  }

  static setupEnlarableImages() {
    document.querySelectorAll('img.' + Luna.elargableClass).forEach(image => {
      image.addEventListener('click', function (e) {
        Luna.enlargeImg(e.target.src);
      });
    });

    Luna.imgEnlargeModal = document.getElementById(Luna.imgEnlargeModalId);
    if (!Luna.imgEnlargeModal) {
      throw new Error("Image enlarging doesn't work because enlarge modal was not found");
    }

    Luna.imgEnlargeModalImg = Luna.imgEnlargeModal.querySelector('img');
    if (!Luna.imgEnlargeModal) {
      throw new Error("Image enlarging doesn't work because enlarge modal doesn't have img node");
    }

    Luna.imgEnlargeModalImg.addEventListener('focusout', function (e) {
      Luna.imgEnlargeModal.classList.remove('active');
    });
    Luna.imgEnlargeModalImg.setAttribute('tabindex', '-1');
    document.addEventListener('keyup', function (e) {
      if (e.keyCode === 27) {
        Luna.imgEnlargeModal.classList.remove('active');
      }
    })
  }

  static enlargeImg(src) {
    Luna.imgEnlargeModal.classList.add('active');
    Luna.imgEnlargeModalImg.focus();
    Luna.imgEnlargeModalImg.src = src;
  }

  static setupMenuLogoRsize() {
    const logo = document.querySelector('#menu .menu-item.logo');
    if (!logo) {
      console.error("Logo not found! Logo resizing is disabled");
      return;
    }

    window.addEventListener('scroll', function (e) {
      if (window.scrollY === 0) {
        logo.classList.remove('small');
      } else {
        logo.classList.add('small');
      }
    });
  }

  static setupContactFrom() {
    if (!this.form) {
      this.form = document.getElementById('contact-form');
      if (!this.form) {
        throw new Error("Form not found, making appointment is disabled");
      }
    }
    this.form.addEventListener('submit', function (e) {
      e.preventDefault();
      const fields = {};

      this.form.querySelectorAll('.required input').forEach(field => {
        if (field.value.length == 0) {
          const mess = 'Field ' + field.placeholder + ' can\'t be empty';
          Luna.formMessage(mess, 'error');
          throw new Error(mess);
        }
      });

      this.form.querySelectorAll('input').forEach(field => {
        fields[field.name] = {
          name: field.name,
          label: field.placeholder,
          value: (field.value.length > 0 ? field.value : null),
          type: field.type
        };
      });

      Luna.addFormLoader();
      fetch('contactform.php', {
        method: "POST",
        headers: {
          'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(fields)
      }).then(response => {
        Luna.removeLoader();
        if (response.status === 200) {
          return response.json();
        }
        console.error('Form error', response);
        Luna.formMessage("Form couldn't be sent because of the server error", 'error');
        throw new Error('Form error');
      }).then(json => {
        this.form.querySelectorAll('input').forEach(input => {
          if (input.type !== 'submit' && input.type !== 'date') {
            input.value = '';
          }
        });
        Luna.formMessage("Form was sent succesfully", 'success');
      })
    }.bind(this));
  }

  static formMessage(message, type, timeout = 10000) {
    const messContainer = this.form.querySelector('.messages');
    if (!messContainer) {
      throw new Error('Message container not found');
    }
    const div = document.createElement('div');
    div.className = type;
    div.innerHTML = message;
    messContainer.innerHTML = '';
    messContainer.appendChild(div);
    setTimeout(function () {
      messContainer.innerHTML = '';
    }, timeout);
  }

  static addFormLoader() {
    const messContainer = this.form.querySelector('.messages');
    if (!messContainer) {
      throw new Error('Message container not found');
    }
    const div = document.createElement('div');
    div.className = 'loader';
    messContainer.innerHTML = '';
    messContainer.appendChild(div);
  }

  static removeLoader() {
    const messContainer = this.form.querySelector('.messages');
    if (!messContainer) {
      throw new Error('Message container not found');
    }
    messContainer.innerHTML = '';
  }
}
Luna.init();

/**
 * Lazy loading library from https://github.com/Mortimer333/LazyLoading
 * @extends HTMLImageElement
 */
class LazyLoading extends HTMLImageElement {
  constructor() {
    super();

    // when there is no support for IntersectionObserver then we do nothing and img will just load
    if ( ( 'IntersectionObserver' in window ) ) {

      this.observer   = false   ;
      this._lazy_src  = this.src;                       // saving correct url
      this.src        = ''      ;                       // removing src before parser will start downloading
      // saving attributes
      this._attributes = this.getAttributeNames().reduce((acc, name) => {
        return {...acc, [name]: this.getAttribute(name)};
      }, {});
      delete this._attributes.src;

      // observer settings
      this.options = {
        root       : null ,
        rootMargin : '0px',
        threshold  : .1
      }

      this.setAttribute('style','padding-bottom:50%;'); // my try to represent ratio 1:2

      this.attachObserver();

    }

  }

  _updateRendering () {
    // required function
  }

  static get observedAttributes() { return ["lazy-src"]; }

  attributeChangedCallback( name, oldValue, newValue ) {
    this._lazy_src = newValue;
    this._updateRendering();
  }

  connectedCallback () {
    this.addEventListener( 'load', this.onImageLoaded.bind( this ) );
    this._updateRendering();
  }

  get lazy_src () {
    return this._lazy_src;
  }

  set lazy_src ( v ) {
    this.setAttribute( "src", v );
  }

  onImageLoaded () {
    this.removeAttribute('style'); // my try to represent ratio 1:2
    Object.keys(this._attributes).forEach(atributeName => {
      this.setAttribute( atributeName, this._attributes[atributeName] );
    });

  }

  attachObserver () {
    if ( this.observer ) this.removeObserver();
    this.observer = new IntersectionObserver( this.handleIntersection.bind( this ), this.options );
    this.observer.observe( this );
  }

  handleIntersection ( entries, observer ) {
    entries.forEach( entry => {
      // if at least 10% of image is visible then load it
      if ( entry.intersectionRatio >= .1 ) {
        this.loadImage     ();
        this.removeObserver();
      }
    });
  }

  removeObserver() {
    this.observer.unobserve( this );
    this.observer = false;
  }

  loadImage () {
    this.src = this._lazy_src;
  }
}

customElements.define("lazy-img", LazyLoading, { extends:'img' } );
