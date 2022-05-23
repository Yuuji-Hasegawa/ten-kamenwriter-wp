import { favicon } from './favicon.mjs';
favicon();

import { menu } from './menu.mjs';
menu();

import { redume } from './redume.mjs';
redume();

import { urlCopy } from './urlcopy.mjs';
urlCopy();

import { lazyLoad } from './lazyload.mjs';
lazyLoad();

import { smoothScroll } from './smoothscroll.mjs';
smoothScroll();

import { config, dom, library } from '@fortawesome/fontawesome-svg-core';
import {
  faHome,
  faMagnifyingGlass,
  faEnvelope,
  faFolderOpen,
  faChartLine,
  faCode,
  faAngleRight,
  faAngleLeft,
  faArrowRotateRight,
  faList,
  faCaretDown,
} from '@fortawesome/free-solid-svg-icons';
import { faFile, faClock } from '@fortawesome/free-regular-svg-icons';
import { faTwitter, faFacebookF, faInstagram } from '@fortawesome/free-brands-svg-icons';

library.add(
  faHome,
  faMagnifyingGlass,
  faEnvelope,
  faTwitter,
  faFolderOpen,
  faChartLine,
  faCode,
  faFile,
  faAngleRight,
  faAngleLeft,
  faArrowRotateRight,
  faClock,
  faList,
  faCaretDown,
  faFacebookF,
  faInstagram,
);

dom.i2svg();
