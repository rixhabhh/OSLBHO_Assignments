import features2 from './features_4.twig';
import features2Data from './features_4.yml';

import './_features_4.scss';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/features_4' };

export const features4 = () => features2(features2Data);
