type Project = {
  id: number
  name: string
  description: string
  color: string | null
  timeline: string /* Date */
  budget: number | null
  resource_allocation: number | null
  user_id: number
  created_at: string /* Date */ | null
  updated_at: string /* Date */ | null
  user?: User | null
  phases?: Phase[] | null
  tasks?: Task[] | null
}
