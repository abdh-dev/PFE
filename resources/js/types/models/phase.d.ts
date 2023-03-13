type Phase = {
    id?: number;
    name: string;
    description: string;
    color: string;
    tasks?: Task[];
    project_id?: number;
    created_at?: string /* Date */ | null;
    updated_at?: string /* Date */ | null;
}
