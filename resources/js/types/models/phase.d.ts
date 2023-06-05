type Phase = {
  id: number
  name: string
  description: string
  color: string | null
  project_id: number | null
  created_at: string /* Date */ | null
  updated_at: string /* Date */ | null
  project?: Project | null
  tasks?: Task[] | null
  media?: Media[] | null
}
