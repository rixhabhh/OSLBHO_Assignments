import features2 from './features_2.twig';
import features2Data from './features_2.yml';

import './_features_2.scss';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/features_2' };

export const features21 = () => features2(features2Data);
