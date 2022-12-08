// import fullpage from './fullpage.twig';
// import fullpageData from './fullpage.yml';

// import './_fullpage.scss';

// /**
//  * Storybook Definition.
//  */
// export default { title: 'Templates/fullpage' };

// export const fullpage1 = () => fullpage(fullpageData);

import virtualseminarTwig from './fullpage.twig';
import navyml from '../../02-molecules/heropage/heropage.yml';
import heroyml from '../../02-molecules/features/features.yml';
import testimonialyml from '../../02-molecules/features_2/features_2.yml';
import seminaryml from '../../02-molecules/display_img/display_img.yml';
import aboutusyml from '../../03-organisms/card_listing/card_listing.yml';
import accordianyml from '../../03-organisms/contact/contact.yml';
import serviceyml from '../../03-organisms/footer/footer.yml';

// import washingtonyml from './washingtondc.yml';
// import '../../03-organisms/accordianmol/accordianmol';
/**
 * Storybook Definition.
 */
export default { title: 'Templates/fullpage' };
export const fullpage1 = () =>
  virtualseminarTwig({
    ...navyml,
    ...heroyml,
    ...aboutusyml,
    ...serviceyml,
    ...seminaryml,
    ...testimonialyml,
    ...accordianyml,
  });
