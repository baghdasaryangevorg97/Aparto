import './Skeleton.scss'

export default function Skeleton({ type }) {
    const skeletonTest = 15;

    const SkeletonTest = () => (
        <div className="skeleton__card">

        </div >
    );

    if (type === "test") return Array(skeletonTest).fill(<SkeletonTest />);
}