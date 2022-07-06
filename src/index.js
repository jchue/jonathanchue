import './style.scss';
import photoData from './content/photos.json';

function getRandomPhoto(photos) {
  const index = Math.floor(Math.random() * (photos.length - 1));

  return photos[index];
}

function getYear() {
  return new Date().getFullYear();
}

window.onload = function () {
  const photo = getRandomPhoto(photoData);

  const background = {
    path: require(`./assets/${photo.file}`),
    position: photo.position,
    title: photo.title,
    url: photo.url,
  };

  /**
   * Set background image
   */

  const styleElement = document.createElement('style');

  styleElement.innerHTML = `html {
    background-image: url('${background.path}');
    background-position: center ${background.position};
  }`;

  document.head.appendChild(styleElement);

  /**
   * Set image caption
   */

  const linkedPhotoCaptionElement = document.querySelector('#linked-photo-caption');
  const photoCaptionElement = document.querySelector('#photo-caption');

  if (background.title) {
    if (background.url) {
      // Set label + URL and remove non-linked version
      linkedPhotoCaptionElement.querySelector('.label').innerHTML = background.title;
      linkedPhotoCaptionElement.setAttribute('href', background.url);
      photoCaptionElement.remove();
    } else {
      // Set label and remove linked version
      photoCaptionElement.querySelector('.label').innerHTML = background.title;
      linkedPhotoCaptionElement.remove();
    }
  } else {
    // Remove both if no title
    linkedPhotoCaptionElement.remove();
    photoCaptionElement.remove();
  }

  /**
   * Set year
   */

  const yearElement = document.querySelector('#year');
  yearElement.innerHTML = getYear();
};
