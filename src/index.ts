import './style.scss';
import photoData from './content/photos.json';

interface Photo {
  file: string,
  position: string,
  title: string,
  url: string,
}

function getRandomPhoto(photos: Photo[]): Photo {
  const index: number = Math.floor(Math.random() * (photos.length - 1));

  return photos[index];
}

function getYear(): number {
  return new Date().getFullYear();
}

window.onload = function mounted() {
  const photo: Photo = getRandomPhoto(photoData);

  const background = {
    // eslint-disable-next-line global-require, import/no-dynamic-require
    path: require(`./assets/${photo.file}`),
    position: photo.position,
    title: photo.title,
    url: photo.url,
  };

  /**
   * Set background image
   */

  const styleElement: HTMLStyleElement = document.createElement('style');

  styleElement.innerHTML = `html {
    background-image: url('${background.path}');
    background-position: center ${background.position};
  }`;

  document.head.appendChild(styleElement);

  /**
   * Set image caption
   */

  const linkedPhotoCaptionElement: Element | null = document.querySelector('#linked-photo-caption');
  const photoCaptionElement: Element | null = document.querySelector('#photo-caption');

  if (linkedPhotoCaptionElement !== null && photoCaptionElement !== null) {
    if (background.title) {
      if (background.url) {
        // Set label + URL and remove non-linked version
        const labelElement: Element | null = linkedPhotoCaptionElement.querySelector('.label');
        if (labelElement !== null) {
          labelElement.innerHTML = background.title;
        }

        linkedPhotoCaptionElement.setAttribute('href', background.url);
        photoCaptionElement.remove();
      } else {
        // Set label and remove linked version
        const labelElement: Element | null = photoCaptionElement.querySelector('.label');
        if (labelElement !== null) {
          labelElement.innerHTML = background.title;
        }

        linkedPhotoCaptionElement.remove();
      }
    } else {
      // Remove both if no title
      linkedPhotoCaptionElement.remove();
      photoCaptionElement.remove();
    }
  }

  /**
   * Set year
   */

  const yearElement: Element | null = document.querySelector('#year');

  if (yearElement !== null) {
    yearElement.innerHTML = getYear().toString();
  }
};
