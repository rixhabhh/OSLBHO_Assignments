import features from './features.twig';
import featuresData from './features.yml';

import './_features.scss';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/features' };

export const features1 = () => features(featuresData);
