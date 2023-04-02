type Project = {
  id?: number
  name: string
  description: string
  color: string
  timeline: string /* Date */
  budget: number
  resource_allocation: number
  phases?: Phase[]
  user_id?: number
  created_at?: string /* Date */ | null
  updated_at?: string /* Date */ | null
}
