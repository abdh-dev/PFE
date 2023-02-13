type Project = {
    id: number;
    name: string;
    description: string;
    timeline: string /* Date */;
    budget: number;
    recource_allocation: number;
    user_id: number;
    created_at: string /* Date */ | null;
    updated_at: string /* Date */ | null;
}
