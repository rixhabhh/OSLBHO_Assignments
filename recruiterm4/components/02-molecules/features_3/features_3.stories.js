import features from './features_3.twig';
import featuresData from './features_3.yml';

import './_features_3.scss';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/features_3' };

export const features3 = () => features(featuresData);
